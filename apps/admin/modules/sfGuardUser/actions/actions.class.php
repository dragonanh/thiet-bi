<?php

require_once dirname(__FILE__) . '/../lib/sfGuardUserGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/sfGuardUserGeneratorHelper.class.php';

/**
 * sfGuardUser actions.
 *
 * @package    radio_ivr
 * @subpackage sfGuardUser
 * @author     loilv4
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserActions extends autoSfGuardUserActions {

	/**
	 * Ham xu ly kich hoat user
	 * @author loilv4
	 * @created on 04/02/2013
	 * @param sfWebRequest $request
	 */
	protected function executeBatchActive(sfWebRequest $request) {
		$ids = $request->getParameter('ids');
		$request->checkCSRFProtection();
		$i18n = sfContext::getInstance()->getI18N();
		$affected = sfGuardUserTable::getInstance()->active($ids);
		$numberErrorRecords = count($ids) - $affected;
		if (!$affected) {
			$this->getUser()->setFlash('error', $numberErrorRecords . ' ' . $i18n->__('người dùng đã chọn ở trạng thái không phù hợp'), true);
		} else {
			if ($numberErrorRecords > 0) {
				$this->getUser()->setFlash('error', $i18n->__('Có') . ' ' . $numberErrorRecords . ' ' . $i18n->__('người dùng ở trạng thái không phù hợp'), true);
			}
			$this->getUser()->setFlash('success', $i18n->__('Đã mở khóa') . ' ' . $affected . ' ' . $i18n->__('người dùng thành công'), true);
			$logArr = array(
				'description' => sprintf('Active %s tài khoản', $affected),
				'object_id' => ''
			);
			UserActionLogTable::insertLog($logArr);
		}
		$current_page = $this->getPager()->getPage();
		$this->redirect('sf_guard_user', array('current_page' => $current_page));
	}

	/**
	 * Ham xu ly huy kich hoat user
	 * @author loilv4
	 * @created on 04/02/2013
	 * @param sfWebRequest $request
	 */
	protected function executeBatchDeactive(sfWebRequest $request) {
		$ids = $request->getParameter('ids');
		$request->checkCSRFProtection();
		$i18n = sfContext::getInstance()->getI18N();
		$affected = sfGuardUserTable::getInstance()->deactive($ids);
		$numberErrorRecords = count($ids) - $affected;
		if (!$affected) {
			$this->getUser()->setFlash('error', $numberErrorRecords . ' ' . $i18n->__('người dùng đã chọn ở trạng thái không phù hợp'), true);
		} else {
			if ($numberErrorRecords > 0) {
				$this->getUser()->setFlash('error', $i18n->__('Có') . ' ' . $numberErrorRecords . ' ' . $i18n->__('người dùng ở trạng thái không phù hợp'), true);
			}
			$this->getUser()->setFlash('success', $i18n->__('Đã khóa') . ' ' . $affected . ' ' . $i18n->__('người dùng thành công'), true);
			$logArr = array(
				'description' => sprintf('Deactive %s tài khoản', $affected),
				'object_id' => ''
			);
			UserActionLogTable::insertLog($logArr);
		}
		$current_page = $this->getPager()->getPage();
		$this->redirect('sf_guard_user', array('current_page' => $current_page));
	}

	/**
	 * Custom ham xu ly processForm de xu ly cho gui email khi edit user
	 * @author loilv4
	 * @Modified on 04/02/2013
	 * @param sfWebRequest $request
	 * @param sfForm $form
	 * @return string
	 */
	protected function processForm(sfWebRequest $request, sfForm $form) {
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid()) {
			$i18n = $this->getContext()->getI18N();
			$notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';
			try {
				$sf_guard_user = $form->save();
				$description = $form->isNew() ? sprintf('Thêm tài khoản %s', $sf_guard_user->getUsername()) : sprintf('Sửa tài khoản %s', $sf_guard_user->getUsername());
				$logArr = array(
					'description' => $description,
					'object_id' => $sf_guard_user->getId()
				);
				UserActionLogTable::insertLog($logArr);
			} catch (Doctrine_Validator_Exception $e) {
				$errorStack = $form->getObject()->getErrorStack();

				$message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ? 's' : null) . " with validation errors: ";
				foreach ($errorStack as $field => $errors) {
					$message .= "$field (" . implode(", ", $errors) . "), ";
				}
				$message = trim($message, ', ');

				$this->getUser()->setFlash('error', $message);
				return sfView::SUCCESS;
			}

			$this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('form' => $form, 'object' => $sf_guard_user)));

			if ($request->hasParameter('_save_and_add')) {
				$this->getUser()->setFlash('success', $notice . ' You can add another one below.');

				$this->redirect('@sf_guard_user_new');
			} else if ($request->hasParameter('_save_and_exit')) {
				$this->getUser()->setFlash('success', $notice);
				$this->redirect('@sf_guard_user');
			} else {
				$this->getUser()->setFlash('success', $notice);

				$this->redirect(array('sf_route' => 'sf_guard_user_edit', 'sf_subject' => $sf_guard_user));
			}
		} else {
			$this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
		}
	}

	/**
	 * Custom action show cho quay ve trang list
	 * @author Huynt74
	 * @modified on 25/01/2013
	 * @param sfWebRequest $request
	 */
	public function executeShow(sfWebRequest $request) {
		$this->redirect('@sf_guard_user');
	}

	/**
	 * ghi log khi xoa
	 * @author loilv4
	 * @modified on 23/04/2013
	 * @param sfWebRequest $request
	 */
	public function executeDelete(sfWebRequest $request) {
		$request->checkCSRFProtection();
		$i18n = sfContext::getInstance()->getI18N();
		$this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));
		$object = $this->getRoute()->getObject();
		$objectName = $object->getUsername();
		$current_user = $this->getUser();
		$delete_user = $this->getRoute()->getObject();

		if ($current_user->getId() === $delete_user->getId()) {
			$current_user->setFlash('error', $i18n->__("You can't delete yourself"));
			$this->redirect('@sf_guard_user_edit?id=' . $delete_user->getId());
		} else {
			if ($delete_user->delete()) {
				$current_user->setFlash('notice', $i18n->__('The item was deleted successfully'));
				$logArr = array(
					'description' => sprintf('Xoá tài khoản %s', $objectName),
					'object_id' => $delete_user->getId()
				);
				UserActionLogTable::insertLog($logArr);
			}

			$this->redirect('@sf_guard_user');
		}
	}

	/**
	 * ghi log khi xoa
	 * @author loilv4
	 * @modified on 23/04/2013
	 * @param sfWebRequest $request
	 */
	protected function executeBatchDelete(sfWebRequest $request) {
		$i18n = sfContext::getInstance()->getI18N();
		$ids = $request->getParameter('ids');
		$records = Doctrine_Query::create()
				->from('sfGuardUser')
				->whereIn('id', $ids)
				->execute();
		$deleteSuccessArr = array();  // Mang luu tru ten cac item xoa thanh cong
		$deleteFailArr = array();  // Mang luu tru ten cac item xoa that bai

		foreach ($records as $record) {
			$this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $record)));
			$recordName = $record->getUsername();
			if (($record->getId() != $this->getUser()->getId()) && $record->delete()) {
				$deleteSuccessArr[] = $recordName;
			} else {
				$deleteFailArr[] = $recordName;
			}
		}

		if (!empty($deleteSuccessArr)) {
			$logArr = array(
				'description' => sprintf('Xoá nhiều tài khoảng %s', implode(',',$deleteSuccessArr)),
				'object_id' => ''
			);
			UserActionLogTable::insertLog($logArr);
		}
		$this->getUser()->setFlash('notice', $i18n->__('The selected items have been deleted successfully.'));

		//start - thongnq1 - 03/05/2013 - fix loi xoa trong trang danh sach (su dung them bien current_page)
		$current_page = $this->getPager()->getPage();
		$this->redirect('sf_guard_user', array('current_page' => $current_page));
		//end -thongnq1
	}
}


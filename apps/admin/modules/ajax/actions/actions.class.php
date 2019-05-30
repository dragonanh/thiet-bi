<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Huynt74
 * Date: 29/01/2013
 * Time: 9:22 AM
 * To change this template use File | Settings | File Templates.
 */
class ajaxActions extends sfActions
{
  public function executeAjaxGetListService(sfWebRequest $request){
    $buId = $request->getParameter('bu_id');
    $listService = array();
    if($buId){
      $listService = VasServiceTable::getListServiceArrByBuId($buId);
      $this->getUser()->setAttribute('list_service', $listService, 'admin_module');
      $filters = $this->getUser()->getAttribute('VasReportBu.filters', array(), 'admin_module');
      $curService = (isset($filters['service']) && $filters['service']) ? $filters['service'] : '';
    }

    return $this->renderPartial('VasReportBu/listService', array('listService' => $listService, 'curService' => $curService));
  }

  public function executeAjaxGetContractRemain(sfWebRequest $request){
    $contractId = $request->getParameter('id');
    $remain = 0;
    if($contractId){
      $contract = VasContractTable::getInstance()->findOneBy('id', $contractId);
      if($contract){
        $remain = $contract->getRemain();
      }
    }

    return $this->renderText($remain);
  }

  public function executeAjaxAddConsumerRevenue(sfWebRequest $request){
    $user = sfContext::getInstance()->getUser()->getGuardUser();
    $serviceId = $request->getPostParameter('service_id');
    $acceptTime = $request->getPostParameter('accept_time');
    $acceptValue = $request->getPostParameter('accept_value');
    //validate du lieu nhap vao
    $check = $this->validateValue($acceptValue);
    if($check['errorCode']){
      return $this->renderText(json_encode($check));
    }
    //kiem tra dich vu co hop le khong
    $buId = !$this->getUser()->checkPermission('admin') ? $user->getBuId() : null;
    $service = VasServiceTable::getServiceByIdAndBuId($serviceId, $buId);
    if($service){
      //thuc hien them moi du lieu vao bang consumer_revenue
      try{
        $revenue = new VasConsumerRevenue();
        $revenue->setServiceId($serviceId);
        $revenue->setValue($acceptValue);
        $revenue->setAcceptTime(date('Y-m-d', strtotime($acceptTime)));
        $revenue->setStatus(VasConsumerRevenueEnum::ACTIVE);
        $revenue->save();

        //luu log action
        ActionLog::save($user->getId(), ActionLog::INSERT_ACTION, $revenue->getId(), ActionLog::VAS_CONSUMER_REVENUE_TYPE);
        //luu log ghi nhan doanh thu
        RevenueLog::save($revenue->getId(), $revenue->getValue(), RevenueLog::CONSUMER_TYPE, $revenue->getAcceptTime());

        return $this->renderText(json_encode(array('errorCode' => 0, 'message' => 'Thêm ghi nhận thành công')));
      }catch (Exception $e){
        VtHelper::writeLogValue('Add new consumer revenue fail | error: '.$e->getMessage(), 'error.log');
        return $this->renderText(json_encode(array('errorCode' => 1, 'message' => 'Có lỗi xảy ra')));
      }
    }else{
      return $this->renderText(json_encode(array('errorCode' => 2, 'message' => 'Dịch vụ không hợp lệ')));
    }
  }

  public function executeAjaxEditConsumerRevenue(sfWebRequest $request){
    $user = sfContext::getInstance()->getUser()->getGuardUser();
    $serviceId = $request->getPostParameter('service_id');
    $acceptValue = $request->getPostParameter('accept_value');
    $id = $request->getParameter('id');
    if($id) {
      //validate du lieu nhap vao
      $check = $this->validateValue($acceptValue);
      if($check['errorCode']){
        return $this->renderText(json_encode($check));
      }
      //kiem tra neu dich vu
      $buId = !$this->getUser()->checkPermission('admin') ? $user->getBuId() : null;
      $service = VasServiceTable::getServiceByIdAndBuId($serviceId, $buId);
      if ($service) {
        //lay doi tuong doanh thu tieu dung tuong ung
        $revenue = VasConsumerRevenueTable::getInstance()->findOneBy('id', $id);
        if($revenue) {
          //thuc hien them moi du lieu vao bang consumer_revenue
          try {
            $oldValue = $revenue->getValue();
            if($acceptValue != $oldValue){
              $revenue->setValue($acceptValue);
              $revenue->save();

              //luu log action
              ActionLog::save($user->getId(), ActionLog::EDIT_ACTION, $revenue->getId(), ActionLog::VAS_CONSUMER_REVENUE_TYPE);
              //luu log ghi nhan doanh thu
              RevenueLog::save($revenue->getId(), $revenue->getValue() - $oldValue, RevenueLog::CONSUMER_TYPE, $revenue->getAcceptTime());
            }

            return $this->renderText(json_encode(array('errorCode' => 0, 'message' => 'Cập nhật ghi nhận thành công')));
          } catch (Exception $e) {
            VtHelper::writeLogValue('Add new consumer revenue fail | error: ' . $e->getMessage(), 'error.log');
            return $this->renderText(json_encode(array('errorCode' => 1, 'message' => 'Có lỗi xảy ra')));
          }
        }else{
          return $this->renderText(json_encode(array('errorCode' => 3, 'message' => 'Bản ghi không hợp lệ')));
        }
      } else {
        return $this->renderText(json_encode(array('errorCode' => 2, 'message' => 'Dịch vụ không hợp lệ')));
      }
    }else{
      return $this->renderText(json_encode(array('errorCode' => 3, 'message' => 'Bản ghi không hợp lệ')));
    }
  }

  public function validateValue($value){
    $result = array('errorCode' => 0);
    if(!$value){
      $result = array('errorCode' => 1, 'message' => 'Không được để trống');
    }else if(!is_numeric($value)){
      $result = array('errorCode' => 1, 'message' => 'Dữ liệu nhập không hợp lệ');
    }

    return $result;
  }
}
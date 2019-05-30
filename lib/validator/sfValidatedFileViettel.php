<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * sfValidatedFile represents a validated uploaded file.
 *
 * @package    symfony
 * @subpackage validator
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfValidatedFile.class.php 30915 2010-09-15 17:10:37Z Kris.Wallsmith $
 */
class sfValidatedFileViettel extends sfValidatedFile
{
  protected
    $saved_path = null,
    $thumbnail_path = '', //ko co thu muc random
    $folderRandom = '',//co them thu muc random
    $fileName = '',
    $uniqueFileName = '';//tuanbm them ten file lay unique

  /**
   * Constructor.
   *
   * @param string $originalName  The original file name
   * @param string $type          The file content type
   * @param string $tempName      The absolute temporary path to the file
   * @param int    $size          The file size (in bytes)
   * @param string $path          The path to save the file (optional).
   */
  public function __construct($originalName, $type, $tempName, $size, $path = null, $saved_path = null,$prefix_path = null)
  {
    $this->uniqueFileName = uniqid();// uniqid(1,true);
    $this->originalName = $originalName;
    $this->tempName = $tempName;
    $this->type = $type;
    $this->size = $size;
    $this->path = $path;
    $this->thumbnail_path = $path;
    if($saved_path==null){
//      $yearFolder = date("Y");
//      $folderRandom = $yearFolder."/".rand(100000,999999);//lay theo ca nam lan random
//      $this->folderRandom = $folderRandom;
//      //thuc generate cau truc thu muc
//      $this->path = $path . "/" . $folderRandom ."/";//duong dan luu file
//      $this->saved_path = "/" . $folderRandom ."/";
      $folderRandom = $this->generateStructurePath($this->uniqueFileName);//lay theo ca nam lan random
      $this->folderRandom = $folderRandom;
      $this->path = $path . "/" . $folderRandom ."/";//duong dan luu file
      //$this->saved_path =  "/" . $folderRandom ."/";
      //2014/07/23: Doan code de luu prefix vao DB:
      $this->saved_path =  $prefix_path . $folderRandom ."/";
    }else{
      //2014/07/23: Doan code de luu prefix vao DB:
      $this->saved_path =  $prefix_path;
    }
  }
  public function generateStructurePath($uniqueFileName){
    //$uiq = uniqid(1,true);
    //$fileName = hash('sha1',$uiq);
    $mash = 255;
    $hashCode = crc32($uniqueFileName);//md5(serialize($fileName));
    $firstDir = $hashCode & $mash;
    $firstDir = vsprintf("%02x",$firstDir);
    $secondDir = ($hashCode >> 8) & $mash;
    $secondDir= vsprintf("%02x",$secondDir);
    $thirdDir = ($hashCode >> 4) & $mash;
    $thirdDir = vsprintf("%02x",$thirdDir);
    return $firstDir."/".$secondDir."/".$thirdDir;
  }


  /**
   * Saves the uploaded file.
   *
   * This method can throw exceptions if there is a problem when saving the file.
   *
   * If you don't pass a file name, it will be generated by the generateFilename method.
   * This will only work if you have passed a path when initializing this instance.
   *
   * @param  string $file      The file path to save the file
   * @param  int    $fileMode  The octal mode to use for the new file
   * @param  bool   $create    Indicates that we should make the directory before moving the file
   * @param  int    $dirMode   The octal mode to use when creating the directory
   *
   * @return string The filename without the $this->path prefix
   *
   * @throws Exception
   */
  public function save($file = null, $fileMode = 0666, $create = true, $dirMode = 0777)
  {
    if (null === $file) {
      $file = $this->generateFilename();
    }

    if ($file[0] != '/' && $file[0] != '\\' && !(strlen($file) > 3 && ctype_alpha($file[0]) && $file[1] == ':' && ($file[2] == '\\' || $file[2] == '/'))) {
      if (null === $this->path) {
        throw new RuntimeException('You must give a "path" when you give a relative file name.');
      }

      $file = $this->path . DIRECTORY_SEPARATOR . $file;
    }

    // get our directory path from the destination filename
    $directory = dirname($file);

    if (!is_readable($directory)) {
      if ($create && !@mkdir($directory, $dirMode, true)) {
        // failed to create the directory
        throw new Exception(sprintf('Failed to create file upload directory "%s".', $directory));
      }

      // chmod the directory since it doesn't seem to work on recursive paths
      chmod($directory, $dirMode);
    }

    if (!is_dir($directory)) {
      // the directory path exists but it's not a directory
      throw new Exception(sprintf('File upload path "%s" exists, but is not a directory.', $directory));
    }

    if (!is_writable($directory)) {
      // the directory isn't writable
      throw new Exception(sprintf('File upload path "%s" is not writable.', $directory));
    }

    // copy the temp file to the destination file
    copy($this->getTempName(), $file);

    // chmod our file
    chmod($file, $fileMode);

    $this->savedName = $file;

    if ($this->path === null) {
      return $file;
    }
    if ($this->saved_path == null) {
      return str_replace($this->path . DIRECTORY_SEPARATOR, '', $file);
    }

    return $this->saved_path . str_replace($this->path . DIRECTORY_SEPARATOR, '', $file);

    //return null === $this->path ? $file : str_replace($this->path . DIRECTORY_SEPARATOR, '', $file);
  }

  /**
   * Generates a random filename for the current file.
   *
   * @return string A random name to represent the current file
   */
  public function generateFilename()
  {
    //$this->fileName =  sha1($this->getOriginalName() . rand(11111, 99999)) . $this->getExtension($this->getOriginalExtension());
    $this->fileName = $this->uniqueFileName. $this->getExtension($this->getOriginalExtension());;//tuanbm viet lai ham generate FileName (Su dung them cau truc filename)
    return $this->fileName;
  }

  /**
   * Returns the path to use when saving a file with a relative filename.
   *
   * @return string ten duong dan luu trong DB /test/test
   */
  public function getSavedPath()
  {
    return $this->saved_path;
  }
  /**
   * Returns the path to use when saving a file with a relative filename.
   *
   * @return string The path thumbnail cho image
   */
  public function getThumbnailPath()
  {
    return $this->thumbnail_path;
  }
  public function createThumbnailImage($folderName,$width,$height){
    $this->createFolderThumbnail($folderName);
    $pathThumbnailSmall = $this->getThumbnailPath()."/".$folderName."/".$this->folderRandom."/".$this->fileName;//upload/song/[thumbnail]/[random000/image.jpg]
    $thumbnail = new sfThumbnail($width, $height);
    $thumbnail->loadFile($this->getSavedName());
    $thumbnail->save($pathThumbnailSmall, 'image/jpeg');
  }
  private function createFolderThumbnail($folderName){
    $folderThumb = $this->getThumbnailPath()."/".$folderName."/".$this->folderRandom;//upload/song/[thumbnail]/[random000/]
    if (!is_dir($folderThumb)) {
      @mkdir($folderThumb, 0777,true);
    }
  }

  public function getUniqueFileName(){
    return $this->uniqueFileName;
  }

}

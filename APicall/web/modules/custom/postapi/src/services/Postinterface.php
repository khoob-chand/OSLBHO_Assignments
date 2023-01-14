<?php 
namespace Drupal\postapi\services;

interface PostInterface{
  public function create($data,$uid);
  public function update($data,$uid);
  public function delete($data,$uid);
  public function read($uid);

}
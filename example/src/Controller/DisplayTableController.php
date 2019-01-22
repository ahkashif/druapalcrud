<?php
namespace Drupal\example\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Database;
use Drupal\Core\Url;
/**
 * Class DisplayTableController.
 *
 * @package Drupal\example\Controller
 */
class DisplayTableController extends ControllerBase {
     public function getContent() {
    $build = [
      'description' => [
        '#theme' => 'example_description',
        '#description' => 'foo',
        '#attributes' => [],
      ],
    ];
    return $build;
  }
  /**
   * Display.
   *
   * @return string
   *   Return Hello string.
   */
  public function display() {

    //create table header
    $header_table = array(
     'id'=>    t('SrNo'),
      'name' => t('Name'),
        'mobilenumber' => t('MobileNumber'),
        //'email'=>t('Email'),
        'age' => t('Age'),
        'gender' => t('Gender'),
        //'website' => t('Web site'),
        'opt' => t('operations'),
        'opt1' => t('operations'),
    );

    $query = \Drupal::database()->select('example', 'm');
      $query->fields('m', ['id','name','mobilenumber','email','age','gender','website']);
      $results = $query->execute()->fetchAll();
        $rows=array();
    foreach($results as $data){
        $delete = Url::fromUserInput('/example/form/delete/'.$data->id);
        $edit   = Url::fromUserInput('/example/form/example?num='.$data->id);
      //print the data from table
             $rows[] = array(
            'id' =>$data->id,
                'name' => $data->name,
                'mobilenumber' => $data->mobilenumber,
                //'email' => $data->email,
                'age' => $data->age,
                'gender' => $data->gender,
                //'website' => $data->website,
                 \Drupal::l('Delete', $delete),
                 \Drupal::l('Edit', $edit),
            );
}
      $form['table'] = [
            '#type' => 'table',
            '#header' => $header_table,
            '#rows' => $rows,
            '#empty' => t('No users found'),
        ];
        return $form;
}
}

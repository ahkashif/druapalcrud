<?php
namespace Drupal\example\Plugin\Block;
use Drupal\Core\Block\BlockBase;
/**
 * Provides a 'exampleBlock' block.
 *
 * @Block(
 *  id = "example_block",
 *  admin_label = @Translation("example block"),
 * )
 */
class ExampleBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    ////$build = [];
    //$build['example_block']['#markup'] = 'Implement exampleBlock.';
    $form = \Drupal::formBuilder()->getForm('Drupal\example\Form\exampleForm');
    return $form;
  }
}
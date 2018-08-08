<?php

namespace Drupal\seo_pager\Plugin\views\display_extender;

use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\display_extender\DisplayExtenderPluginBase;

/**
 * SEO pager display extender plugin.
 *
 * @ingroup views_display_extender_plugins
 *
 * @ViewsDisplayExtender(
 *   id = "seo_pager_display_extender",
 *   title = @Translation("SEO pager display extender"),
 *   help = @Translation("Allows you to improve SEO for views pagers."),
 *   no_ui = FALSE
 * )
 */
class SeoPagerDisplayExtender extends DisplayExtenderPluginBase {

  /**
   * Provide a form to edit options for this plugin.
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    if ($form_state->get('section') == 'seo_pager') {
      $form['#title'] .= t('SEO pager settings for this display');
      $form['seo_pager'] = [
        '#type' => 'checkbox',
        '#title' => $this->t('Status'),
        '#description' => $this->t('Enable it to add rel metatags for pager if possible.'),
        '#default_value' => $this->isEnabled(),
      ];
    }
  }

  /**
   * Validate the options form.
   */
  public function validateOptionsForm(&$form, FormStateInterface $form_state) {
    if ($form_state->get('section') == 'seo_pager') {
      $this->options['enabled'] = $form_state->getValue('seo_pager');
    }
  }

  /**
   * Handle any special handling on the validate form.
   *
   * Executes on View save button.
   */
  public function submitOptionsForm(&$form, FormStateInterface $form_state) {
    if ($form_state->get('section') == 'seo_pager') {
      $this->options['enabled'] = $form_state->getValue('seo_pager');
    }
  }

  /**
   * Provide the default summary for options in the views UI.
   *
   * This output is returned as an array.
   */
  public function optionsSummary(&$categories, &$options) {
    $options['seo_pager'] = [
      'category' => 'pager',
      'title' => t('SEO pager'),
      'value' => $this->isEnabled() ? t('Enabled') : t('Disabled'),
    ];
  }

  /**
   * Identify this option is enabled or not.
   */
  public function isEnabled() {
    return !empty($this->options['enabled']) ? $this->options['enabled'] : FALSE;
  }

}

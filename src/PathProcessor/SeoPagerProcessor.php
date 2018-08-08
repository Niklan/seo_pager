<?php

namespace Drupal\seo_pager\PathProcessor;

use Drupal\Core\PathProcessor\InboundPathProcessorInterface;
use Drupal\Core\PathProcessor\OutboundPathProcessorInterface;
use Drupal\Core\Render\BubbleableMetadata;
use Symfony\Component\HttpFoundation\Request;

/**
 * Processes the inbound and outbound pager query.
 */
class SeoPagerProcessor implements InboundPathProcessorInterface, OutboundPathProcessorInterface {

  /**
   * {@inheritdoc}
   */
  public function processInbound($path, Request $request) {
    if ($request->query->has('page')) {
      $page_external = $request->query->get('page');
      $page_internal = $page_external - 1;
      $request->query->set('page', $page_internal);
    }
    return $path;
  }

  /**
   * {@inheritdoc}
   */
  public function processOutbound($path, &$options = [], Request $request = NULL, BubbleableMetadata $bubbleable_metadata = NULL) {
    if (isset($options['query']['page']) && (!empty($options['query']['page']) || $options['query']['page'] == 0)) {
      if ($options['query']['page'] == 0) {
        unset($options['query']['page']);
      }
      elseif ($options['query']['page'] > 0) {
        $page_internal = $options['query']['page'];
        $page_external = $page_internal + 1;
        $options['query']['page'] = $page_external;
      }
    }
    return $path;
  }

}

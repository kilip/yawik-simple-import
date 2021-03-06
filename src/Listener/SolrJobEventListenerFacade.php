<?php declare(strict_types=1);
/**
 * YAWIK SimpleImport
 *
 * @filesource
 * @copyright 2019 CROSS Solution <https://www.cross-solution.de>
 * @license MIT
 */

namespace SimpleImport\Listener;

use Jobs\Entity\JobInterface;
use Solr\Listener\JobEventSubscriber;

/**
 * Facade for yawik/solr JobEventSubscriber.
 * Make this module independent from yawik/solr, yet enables updates to solr
 * documents, if yawik/solr is enabled.
 *
 * @author Mathias Gelhausen <gelhausen@cross-solution.de>
 * TODO: write tests
 */
class SolrJobEventListenerFacade
{
    /**
     * @var JobEventSubscriber|null
     */
    private $solrListener;

    public function __construct(?JobEventSubscriber $solrListener)
    {
        $this->solrListener = $solrListener;
    }

    public function forceUpdate(JobInterface $job): void
    {
        if ($this->solrListener && method_exists($this->solrListener, 'forceUpdate')) {
            $this->solrListener->forceUpdate($job);
        }
    }
}

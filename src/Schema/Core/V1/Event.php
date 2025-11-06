<?php

/*
 * This file is part of the P8P project.
 *
 * (c) Julien Jacottet <jjacottet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace P8p\Sdk\Schema\Core\V1;

use P8p\Client\Attribute\K8sSchema;
use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.Event')]
#[K8sSchema(kind: 'Event', group: '', version: 'v1')]
class Event
{
    /**
     * @param ObjectReference      $involvedObject     the object that this event is about
     * @param ObjectMeta           $metadata           Standard object's metadata. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     * @param string|null          $action             what action was taken/failed regarding to the Regarding object
     * @param int|null             $count              the number of times this event has occurred
     * @param \DateTime|null       $eventTime          time when this Event was first observed
     * @param \DateTime|null       $firstTimestamp     The time at which the event was first recorded. (Time of server receipt is in TypeMeta.)
     * @param \DateTime|null       $lastTimestamp      the time at which the most recent occurrence of this event was recorded
     * @param string|null          $message            a human-readable description of the status of this operation
     * @param string|null          $reason             this should be a short, machine understandable string that gives the reason for the transition into the object's current status
     * @param ObjectReference|null $related            optional secondary object for more complex actions
     * @param string|null          $reportingComponent Name of the controller that emitted this Event, e.g. `kubernetes.io/kubelet`.
     * @param string|null          $reportingInstance  ID of the controller instance, e.g. `kubelet-xyzf`.
     * @param EventSeries|null     $series             data about the Event series this event represents or nil if it's a singleton Event
     * @param EventSource|null     $source             The component reporting this event. Should be a short machine understandable string.
     * @param string|null          $type               Type of this event (Normal, Warning), new types could be added in the future
     */
    public function __construct(
        public ObjectReference $involvedObject,
        public ObjectMeta $metadata,
        public ?string $action = null,
        public ?int $count = null,
        public ?\DateTime $eventTime = null,
        public ?\DateTime $firstTimestamp = null,
        public ?\DateTime $lastTimestamp = null,
        public ?string $message = null,
        public ?string $reason = null,
        public ?ObjectReference $related = null,
        public ?string $reportingComponent = null,
        public ?string $reportingInstance = null,
        public ?EventSeries $series = null,
        public ?EventSource $source = null,
        public ?string $type = null,
    ) {
    }
}

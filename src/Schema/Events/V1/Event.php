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

namespace P8p\Sdk\Schema\Events\V1;

use P8p\Client\Attribute\K8sSchema;
use P8p\Client\Attribute\K8sSchemaRef;
use P8p\Sdk\Schema\Core\V1\EventSource;
use P8p\Sdk\Schema\Core\V1\ObjectMeta;
use P8p\Sdk\Schema\Core\V1\ObjectReference;

#[K8sSchemaRef(name: 'io.k8s.api.events.v1.Event')]
#[K8sSchema(kind: 'Event', group: 'events.k8s.io', version: 'v1')]
class Event
{
    /**
     * @param \DateTime            $eventTime                eventTime is the time when this Event was first observed. It is required.
     * @param string|null          $action                   action is what action was taken/failed regarding to the regarding object. It is machine-readable. This field cannot be empty for new Events and it can have at most 128 characters.
     * @param int|null             $deprecatedCount          deprecatedCount is the deprecated field assuring backward compatibility with core.v1 Event type.
     * @param \DateTime|null       $deprecatedFirstTimestamp deprecatedFirstTimestamp is the deprecated field assuring backward compatibility with core.v1 Event type.
     * @param \DateTime|null       $deprecatedLastTimestamp  deprecatedLastTimestamp is the deprecated field assuring backward compatibility with core.v1 Event type.
     * @param EventSource|null     $deprecatedSource         deprecatedSource is the deprecated field assuring backward compatibility with core.v1 Event type.
     * @param ObjectMeta|null      $metadata                 Standard object's metadata. More info: https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     * @param string|null          $note                     note is a human-readable description of the status of this operation. Maximal length of the note is 1kB, but libraries should be prepared to handle values up to 64kB.
     * @param string|null          $reason                   reason is why the action was taken. It is human-readable. This field cannot be empty for new Events and it can have at most 128 characters.
     * @param ObjectReference|null $regarding                regarding contains the object this Event is about. In most cases it's an Object reporting controller implements, e.g. ReplicaSetController implements ReplicaSets and this event is emitted because it acts on some changes in a ReplicaSet object.
     * @param ObjectReference|null $related                  related is the optional secondary object for more complex actions. E.g. when regarding object triggers a creation or deletion of related object.
     * @param string|null          $reportingController      reportingController is the name of the controller that emitted this Event, e.g. `kubernetes.io/kubelet`. This field cannot be empty for new Events.
     * @param string|null          $reportingInstance        reportingInstance is the ID of the controller instance, e.g. `kubelet-xyzf`. This field cannot be empty for new Events and it can have at most 128 characters.
     * @param EventSeries|null     $series                   series is data about the Event series this event represents or nil if it's a singleton Event
     * @param string|null          $type                     type is the type of this event (Normal, Warning), new types could be added in the future. It is machine-readable. This field cannot be empty for new Events.
     */
    public function __construct(
        public \DateTime $eventTime,
        public ?string $action = null,
        public ?int $deprecatedCount = null,
        public ?\DateTime $deprecatedFirstTimestamp = null,
        public ?\DateTime $deprecatedLastTimestamp = null,
        public ?EventSource $deprecatedSource = null,
        public ?ObjectMeta $metadata = null,
        public ?string $note = null,
        public ?string $reason = null,
        public ?ObjectReference $regarding = null,
        public ?ObjectReference $related = null,
        public ?string $reportingController = null,
        public ?string $reportingInstance = null,
        public ?EventSeries $series = null,
        public ?string $type = null,
    ) {
    }
}

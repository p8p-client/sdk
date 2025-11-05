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

use P8p\Client\Attribute\K8sSchemaRef;

#[K8sSchemaRef(name: 'io.k8s.api.core.v1.PersistentVolumeSpec')]
class PersistentVolumeSpec
{
    /**
     * @param array<int, string>|null               $accessModes                   accessModes contains all ways the volume can be mounted. More info: https://kubernetes.io/docs/concepts/storage/persistent-volumes#access-modes
     * @param AWSElasticBlockStoreVolumeSource|null $awsElasticBlockStore          awsElasticBlockStore represents an AWS Disk resource that is attached to a kubelet's host machine and then exposed to the pod. Deprecated: AWSElasticBlockStore is deprecated. All operations for the in-tree awsElasticBlockStore type are redirected to the ebs.csi.aws.com CSI driver. More info: https://kubernetes.io/docs/concepts/storage/volumes#awselasticblockstore
     * @param AzureDiskVolumeSource|null            $azureDisk                     azureDisk represents an Azure Data Disk mount on the host and bind mount to the pod. Deprecated: AzureDisk is deprecated. All operations for the in-tree azureDisk type are redirected to the disk.csi.azure.com CSI driver.
     * @param AzureFilePersistentVolumeSource|null  $azureFile                     azureFile represents an Azure File Service mount on the host and bind mount to the pod. Deprecated: AzureFile is deprecated. All operations for the in-tree azureFile type are redirected to the file.csi.azure.com CSI driver.
     * @param array<mixed>|null                     $capacity                      capacity is the description of the persistent volume's resources and capacity. More info: https://kubernetes.io/docs/concepts/storage/persistent-volumes#capacity
     * @param CephFSPersistentVolumeSource|null     $cephfs                        cephFS represents a Ceph FS mount on the host that shares a pod's lifetime. Deprecated: CephFS is deprecated and the in-tree cephfs type is no longer supported.
     * @param CinderPersistentVolumeSource|null     $cinder                        cinder represents a cinder volume attached and mounted on kubelets host machine. Deprecated: Cinder is deprecated. All operations for the in-tree cinder type are redirected to the cinder.csi.openstack.org CSI driver. More info: https://examples.k8s.io/mysql-cinder-pd/README.md
     * @param ObjectReference|null                  $claimRef                      claimRef is part of a bi-directional binding between PersistentVolume and PersistentVolumeClaim. Expected to be non-nil when bound. claim.VolumeName is the authoritative bind between PV and PVC. More info: https://kubernetes.io/docs/concepts/storage/persistent-volumes#binding
     * @param CSIPersistentVolumeSource|null        $csi                           csi represents storage that is handled by an external CSI driver
     * @param FCVolumeSource|null                   $fc                            fc represents a Fibre Channel resource that is attached to a kubelet's host machine and then exposed to the pod
     * @param FlexPersistentVolumeSource|null       $flexVolume                    flexVolume represents a generic volume resource that is provisioned/attached using an exec based plugin. Deprecated: FlexVolume is deprecated. Consider using a CSIDriver instead.
     * @param FlockerVolumeSource|null              $flocker                       flocker represents a Flocker volume attached to a kubelet's host machine and exposed to the pod for its usage. This depends on the Flocker control service being running. Deprecated: Flocker is deprecated and the in-tree flocker type is no longer supported.
     * @param GCEPersistentDiskVolumeSource|null    $gcePersistentDisk             gcePersistentDisk represents a GCE Disk resource that is attached to a kubelet's host machine and then exposed to the pod. Provisioned by an admin. Deprecated: GCEPersistentDisk is deprecated. All operations for the in-tree gcePersistentDisk type are redirected to the pd.csi.storage.gke.io CSI driver. More info: https://kubernetes.io/docs/concepts/storage/volumes#gcepersistentdisk
     * @param GlusterfsPersistentVolumeSource|null  $glusterfs                     glusterfs represents a Glusterfs volume that is attached to a host and exposed to the pod. Provisioned by an admin. Deprecated: Glusterfs is deprecated and the in-tree glusterfs type is no longer supported. More info: https://examples.k8s.io/volumes/glusterfs/README.md
     * @param HostPathVolumeSource|null             $hostPath                      hostPath represents a directory on the host. Provisioned by a developer or tester. This is useful for single-node development and testing only! On-host storage is not supported in any way and WILL NOT WORK in a multi-node cluster. More info: https://kubernetes.io/docs/concepts/storage/volumes#hostpath
     * @param ISCSIPersistentVolumeSource|null      $iscsi                         iscsi represents an ISCSI Disk resource that is attached to a kubelet's host machine and then exposed to the pod. Provisioned by an admin.
     * @param LocalVolumeSource|null                $local                         local represents directly-attached storage with node affinity
     * @param array<int, string>|null               $mountOptions                  mountOptions is the list of mount options, e.g. ["ro", "soft"]. Not validated - mount will simply fail if one is invalid. More info: https://kubernetes.io/docs/concepts/storage/persistent-volumes/#mount-options
     * @param NFSVolumeSource|null                  $nfs                           nfs represents an NFS mount on the host. Provisioned by an admin. More info: https://kubernetes.io/docs/concepts/storage/volumes#nfs
     * @param VolumeNodeAffinity|null               $nodeAffinity                  nodeAffinity defines constraints that limit what nodes this volume can be accessed from. This field influences the scheduling of pods that use this volume.
     * @param string|null                           $persistentVolumeReclaimPolicy persistentVolumeReclaimPolicy defines what happens to a persistent volume when released from its claim. Valid options are Retain (default for manually created PersistentVolumes), Delete (default for dynamically provisioned PersistentVolumes), and Recycle (deprecated). Recycle must be supported by the volume plugin underlying this PersistentVolume. More info: https://kubernetes.io/docs/concepts/storage/persistent-volumes#reclaiming
     *
     * Possible enum values:
     *  - `"Delete"` means the volume will be deleted from Kubernetes on release from its claim. The volume plugin must support Deletion.
     *  - `"Recycle"` means the volume will be recycled back into the pool of unbound persistent volumes on release from its claim. The volume plugin must support Recycling.
     *  - `"Retain"` means the volume will be left in its current phase (Released) for manual reclamation by the administrator. The default policy is Retain.
     * @param PhotonPersistentDiskVolumeSource|null $photonPersistentDisk      photonPersistentDisk represents a PhotonController persistent disk attached and mounted on kubelets host machine. Deprecated: PhotonPersistentDisk is deprecated and the in-tree photonPersistentDisk type is no longer supported.
     * @param PortworxVolumeSource|null             $portworxVolume            portworxVolume represents a portworx volume attached and mounted on kubelets host machine. Deprecated: PortworxVolume is deprecated. All operations for the in-tree portworxVolume type are redirected to the pxd.portworx.com CSI driver when the CSIMigrationPortworx feature-gate is on.
     * @param QuobyteVolumeSource|null              $quobyte                   quobyte represents a Quobyte mount on the host that shares a pod's lifetime. Deprecated: Quobyte is deprecated and the in-tree quobyte type is no longer supported.
     * @param RBDPersistentVolumeSource|null        $rbd                       rbd represents a Rados Block Device mount on the host that shares a pod's lifetime. Deprecated: RBD is deprecated and the in-tree rbd type is no longer supported. More info: https://examples.k8s.io/volumes/rbd/README.md
     * @param ScaleIOPersistentVolumeSource|null    $scaleIO                   scaleIO represents a ScaleIO persistent volume attached and mounted on Kubernetes nodes. Deprecated: ScaleIO is deprecated and the in-tree scaleIO type is no longer supported.
     * @param string|null                           $storageClassName          storageClassName is the name of StorageClass to which this persistent volume belongs. Empty value means that this volume does not belong to any StorageClass.
     * @param StorageOSPersistentVolumeSource|null  $storageos                 storageOS represents a StorageOS volume that is attached to the kubelet's host machine and mounted into the pod. Deprecated: StorageOS is deprecated and the in-tree storageos type is no longer supported. More info: https://examples.k8s.io/volumes/storageos/README.md
     * @param string|null                           $volumeAttributesClassName Name of VolumeAttributesClass to which this persistent volume belongs. Empty value is not allowed. When this field is not set, it indicates that this volume does not belong to any VolumeAttributesClass. This field is mutable and can be changed by the CSI driver after a volume has been updated successfully to a new class. For an unbound PersistentVolume, the volumeAttributesClassName will be matched with unbound PersistentVolumeClaims during the binding process. This is a beta field and requires enabling VolumeAttributesClass feature (off by default).
     * @param string|null                           $volumeMode                volumeMode defines if a volume is intended to be used with a formatted filesystem or to remain in raw block state. Value of Filesystem is implied when not included in spec.
     *
     * Possible enum values:
     *  - `"Block"` means the volume will not be formatted with a filesystem and will remain a raw block device.
     *  - `"Filesystem"` means the volume will be or is formatted with a filesystem.
     * @param VsphereVirtualDiskVolumeSource|null $vsphereVolume vsphereVolume represents a vSphere volume attached and mounted on kubelets host machine. Deprecated: VsphereVolume is deprecated. All operations for the in-tree vsphereVolume type are redirected to the csi.vsphere.vmware.com CSI driver.
     */
    public function __construct(
        public ?array $accessModes = null,
        public ?AWSElasticBlockStoreVolumeSource $awsElasticBlockStore = null,
        public ?AzureDiskVolumeSource $azureDisk = null,
        public ?AzureFilePersistentVolumeSource $azureFile = null,
        public ?array $capacity = null,
        public ?CephFSPersistentVolumeSource $cephfs = null,
        public ?CinderPersistentVolumeSource $cinder = null,
        public ?ObjectReference $claimRef = null,
        public ?CSIPersistentVolumeSource $csi = null,
        public ?FCVolumeSource $fc = null,
        public ?FlexPersistentVolumeSource $flexVolume = null,
        public ?FlockerVolumeSource $flocker = null,
        public ?GCEPersistentDiskVolumeSource $gcePersistentDisk = null,
        public ?GlusterfsPersistentVolumeSource $glusterfs = null,
        public ?HostPathVolumeSource $hostPath = null,
        public ?ISCSIPersistentVolumeSource $iscsi = null,
        public ?LocalVolumeSource $local = null,
        public ?array $mountOptions = null,
        public ?NFSVolumeSource $nfs = null,
        public ?VolumeNodeAffinity $nodeAffinity = null,
        public ?string $persistentVolumeReclaimPolicy = null,
        public ?PhotonPersistentDiskVolumeSource $photonPersistentDisk = null,
        public ?PortworxVolumeSource $portworxVolume = null,
        public ?QuobyteVolumeSource $quobyte = null,
        public ?RBDPersistentVolumeSource $rbd = null,
        public ?ScaleIOPersistentVolumeSource $scaleIO = null,
        public ?string $storageClassName = null,
        public ?StorageOSPersistentVolumeSource $storageos = null,
        public ?string $volumeAttributesClassName = null,
        public ?string $volumeMode = null,
        public ?VsphereVirtualDiskVolumeSource $vsphereVolume = null,
    ) {
    }
}

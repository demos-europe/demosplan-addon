<?php

declare(strict_types=1);

namespace DemosEurope\DemosplanAddon\Contracts\Entities;

use DateTimeInterface;

interface VideoInterface extends UuidEntityInterface
{
    /**
     * Taken from [iana](https://www.iana.org/assignments/media-types/media-types.xhtml#video).
     */
    public const VALID_MIME_TYPES = [
        'video/1d-interleaved-parityfec',
        'video/3gpp',
        'video/3gpp2',
        'video/3gpp-tt',
        'video/AV1',
        'video/BMPEG',
        'video/BT656',
        'video/CelB',
        'video/DV',
        'video/encaprtp',
        'video/example',
        'video/FFV1',
        'video/flexfec',
        'video/H261',
        'video/H263',
        'video/H263-1998',
        'video/H263-2000',
        'video/H264',
        'video/H264-RCDO',
        'video/H264-SVC',
        'video/H265',
        'video/iso.segment',
        'video/JPEG',
        'video/jpeg2000',
        'video/jxsv',
        'video/mj2',
        'video/MP1S',
        'video/MP2P',
        'video/MP2T',
        'video/mp4',
        'video/MP4V-ES',
        'video/MPV',
        'video/mpeg4-generic',
        'video/nv',
        'video/ogg',
        'video/parityfec',
        'video/pointer',
        'video/quicktime',
        'video/raptorfec',
        'video/raw',
        'video/rtp-enc-aescm128',
        'video/rtploopback',
        'video/rtx',
        'video/scip',
        'video/smpte291',
        'video/SMPTE292M',
        'video/ulpfec',
        'video/vc1',
        'video/vc2',
        'video/vnd.CCTV',
        'video/vnd.dece.hd',
        'video/vnd.dece.mobile',
        'video/vnd.dece.mp4',
        'video/vnd.dece.pd',
        'video/vnd.dece.sd',
        'video/vnd.dece.video',
        'video/vnd.directv.mpeg',
        'video/vnd.directv.mpeg-tts',
        'video/vnd.dlna.mpeg-tts',
        'video/vnd.dvb.file',
        'video/vnd.fvt',
        'video/vnd.hns.video',
        'video/vnd.iptvforum.1dparityfec-1010',
        'video/vnd.iptvforum.1dparityfec-2005',
        'video/vnd.iptvforum.2dparityfec-1010',
        'video/vnd.iptvforum.2dparityfec-2005',
        'video/vnd.iptvforum.ttsavc',
        'video/vnd.iptvforum.ttsmpeg2',
        'video/vnd.motorola.video',
        'video/vnd.motorola.videop',
        'video/vnd.mpegurl',
        'video/vnd.ms-playready.media.pyv',
        'video/vnd.nokia.interleaved-multimedia',
        'video/vnd.nokia.mp4vr',
        'video/vnd.nokia.videovoip',
        'video/vnd.objectvideo',
        'video/vnd.radgamettools.bink',
        'video/vnd.radgamettools.smacker',
        'video/vnd.sealed.mpeg1',
        'video/vnd.sealed.mpeg4',
        'video/vnd.sealed.swf',
        'video/vnd.sealedmedia.softseal.mov',
        'video/vnd.uvvu.mp4',
        'video/vnd.youtube.yt',
        'video/vnd.vivo',
        'video/VP8',
        'video/VP9',
    ];
    public function getUploader(): ?UserInterface;

    public function getCustomerContext(): CustomerInterface;

    public function getFile(): FileInterface;

    public function getTitle(): string;

    public function setTitle(string $title): self;

    public function getDescription(): string;

    public function setDescription(string $description): self;

    public function getCreationDate(): ?DateTimeInterface;

    public function getModificationDate(): ?DateTimeInterface;
}

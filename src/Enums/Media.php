<?php

namespace BlissJaspis\WhatsappCloudApi\Enums;

enum Media: string
{
    case ImageJPEG = 'image/jpeg';
    case ImagePNG = 'image/png';
    case ImageWEBP = 'image/webp';

    case TextPlain = 'text/plain';
    case PDF = 'application/pdf';

    case MSPowerpoint = 'application/vnd.ms-powerpoint';
    case MSExcel = 'application/vnd.ms-excel';
    case MSWord = 'application/msword';

    case OpenOfficeDocument = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
    case OpenOfficePresentation = 'application/vnd.openxmlformats-officedocument.presentationml.presentation';
    case OpenOfficeSheet = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';

    case AudioAAC = 'audio/aac';
    case AudioMP4 = 'audio/mp4';
    case AudioMPEG = 'audio/mpeg';
    case AudioAMR = 'audio/amr';
    case AudioOGG = 'audio/ogg';
    case AudioOPUS = 'audio/opus';

    case VideoMP4 = 'video/mp4';
    case Video3GP = 'video/3gp';
}

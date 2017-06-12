<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 *  JW Player media player library.
 *
 * @package    media_jwplayer
 * @copyright  2017 Ruslan Kabalin, Lancaster University
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// Current version of cloud-hosted JW Player.
if (!defined('MEDIA_JWPLAYER_CLOUD_VERSION')) {
    // This is the only place where version needs to be changed in case of new
    // release avialability.
    define('MEDIA_JWPLAYER_CLOUD_VERSION', '7.10.1');
}

// Size and aspect ratio related defaults.
if (!defined('MEDIA_JWPLAYER_VIDEO_WIDTH')) {
    // Default video width if no width is specified.
    // May be defined in config.php if required.
    define('MEDIA_JWPLAYER_VIDEO_WIDTH', 400);
}
if (!defined('MEDIA_JWPLAYER_VIDEO_WIDTH_RESPONSIVE')) {
    // Default video width if no width is specified.
    // May be defined in config.php if required.
    define('MEDIA_JWPLAYER_VIDEO_WIDTH_RESPONSIVE', '100%');
}
if (!defined('MEDIA_JWPLAYER_VIDEO_ASPECTRATIO_W')) {
    // Default video aspect ratio for responsive mode if no height is specified.
    // May be defined in config.php if required.
    define('MEDIA_JWPLAYER_VIDEO_ASPECTRATIO_W', 16);
}
if (!defined('MEDIA_JWPLAYER_VIDEO_ASPECTRATIO_H')) {
    // Default video aspect ratio for responsive mode if no height is specified.
    // May be defined in config.php if required.
    define('MEDIA_JWPLAYER_VIDEO_ASPECTRATIO_H', 9);
}
if (!defined('MEDIA_JWPLAYER_AUDIO_WIDTH')) {
    // Default audio width if no width is specified.
    // May be defined in config.php if required.
    define('MEDIA_JWPLAYER_AUDIO_WIDTH', 400);
}
if (!defined('MEDIA_JWPLAYER_AUDIO_HEIGHT')) {
    // Default audio heigth if no height is specified.
    // May be defined in config.php if required.
    define('MEDIA_JWPLAYER_AUDIO_HEIGHT', 30);
}
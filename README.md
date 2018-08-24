moodle-media_jwplayer
======================

This a media player plugin that allows using JW Player 7 for playing HTML5 and
Flash content in Moodle 3.2 and higher<sup>1</sup>. The plugin is designed
to achieve consistency of the player appearance in all major browsers and
mobile platforms. The player supports Flash fallback, which provides more
devices and formats coverage than either HTML5 or Flash can handle alone.
The player also supports RTMP as well as HLS and MPEG-DASH
streaming<sup>2</sup>.

<sub><sup>1</sup> See plugin release notes for the list of supported Moodle versions.</sub>
<sub><sup>2</sup> HLS and MPEG-DASH support require paid license.</sub>

Installation
------------

JW Player installation procedure consists of three steps: player libraries
installation (optional), player plugin installation and player plugin
configuration.

The plugin does not include JW Player libraries due license limitations.
You are supposed to make sure that JW Player libraries are available in
your system, either by copying them in specified directory in Moodle
(self-hosted mode), or by configuring plugin to use the cloud version of JW
Player hosted by JW Player CDN (more preferable option). In either case you
need to register on JW Player website http://www.jwplayer.com/sign-up/ and
accept terms of use.

### Media player plugin installation

The player plugin installation is pretty strightforward. Plugin files need to be
placed in `./media/player/jwplayer` directory in Moodle, then you will need to go
through installation process as normal by loggining in as admin.

### JW Player libraries installation (only for self-hosted player)

If you decide to use self-hosted player, you need to download player libraries from [License Keys &
Downloads](https://dashboard.jwplayer.com/#/players/downloads) area of
account dashboard, unpack, and place the content of unpacked
`jwplayer-x.x.x` directory to `./media/player/jwplayer/jwplayer` directory
in Moodle. This is where plugin will be looking for `jwplayer.js` file when
you select self-hosted mode in the plugin settings.

### Media player plugin configuration

When the player plugin installation is completed, the plugin configuration
page will be displayed (alternatively you may access it via Site
Administration -> Plugins -> Media players).

At a minimum, you need to specify player hosting method of your choice and
a license key. The license key is required for any hosting method,
irrespective whether you are using a free or premium version of JW Player.
The license key can be found on  [License Keys &
Downloads](https://dashboard.jwplayer.com/#/players/downloads) area of
account dashboard. You need to copy a licence key text field for "JW Player 7
(Self-Hosted)" and insert it in the "Player licence key" field in the
plugin settings, even if you decided to use cloud-hosted player for your
installation<sup>3</sup>.

There are more settings, allowing you to configure media types for which
player will be used, player appearance, analytics.

Once the player is configured, the final step would be to enable the player
on Manage media players page in Site Administration area and move it above
"VideoJS player" to give it a higher priority (or according to your
preference).

<sub><sup>3</sup> Notice, that cloud-hosting method has nothing to do with
Cloud Player concept you will find on JW Player website, that allows
pre-configuring player and using it anywhere else. In our case, cloud is
similar to self-hosted, the difference is that libaries are hosted using
JW Player CDN rather than located locally in Moodle.</sub>

Upgrading from filter_jwplayer
------------------------------

Notice, that this plugin replaces [moodle-filter_jwplayer](https://github.com/lucisgit/moodle-filter_jwplayer), which you may use in Moodle 3.2. It is advided to remove (or at least disable) JW Player filter plugin when installing this plugin.

While the player plugin configuration settings are the same as in
moodle-filter_jwplayer plugin, there is no automatic settings import, so
you need to configure player plugin after installation.

There are some important differences:

* Self-hosted player files are no longer located at `./lib/jwplayer`, player plugin will look for them in `./media/player/jwplayer/jwplayer` directory.

* If you were overriding any php constants for default configuration, they changed from `FILTER_JWPLAYER_*` to `MEDIA_JWPLAYER_*`.

* `FILTER_JWPLAYER_VIDEO_WIDTH` constant has been deprecated, use  Site Administration -> Plugins -> Media players -> Manage media players page (or $CFG->media_default_width in your config file) to set default player width.


Usage
-----

Any multimedia content added to Moodle through HTML editor (either using
the URL or media embedding dialog), as well as File/URL resource, will be
rendered and played using JW Player if the format is supported and enabled
in the plugin configuration.  For more details on supported formats see
[Media Format
Reference](http://support.jwplayer.com/customer/en/portal/articles/1403635-media-format-reference)
on JW Player website (ignore YouTube and RSS sections as they are not
supported by plugin).

Advanced use
------------

The plugin has extensive customisation features.

### Global HTML attributes

[Global HTML
attributes](https://developer.mozilla.org/en/docs/Web/HTML/Global_attributes)
in the player link will be applied to the rendered player outer span tag.
These attributes are:

_accesskey, class, contenteditable, contextmenu, dir, draggable, dropzone,
hidden, id, lang, spellcheck, style, tabindex, title, translate_

In addition, attribures that start with _data-_ (but not _data-jwplayer-_)
will be applied to player's outer span tag.

For example, `<a style="text-align: right;"
href="https://some.stream.org/functional.webm">functional.webm</a>` will
make player aligned to the right.

### JW Player specific attributes

HTML attributes in the player link that start with _data-jwplayer-_ prefix,
will be used as player configuration options. The possible options are:

_aspectratio, autostart, controls, height, mute, primary, repeat, width,
androidhls, hlslabels, description, mediaid, subtitles_

For full description of each option, please refer to [configuration
reference](https://developer.jwplayer.com/jw-player/docs/developer-guide/customization/configuration-reference/)
on JW Player website. Options _file_ and _image_ are not relevant, thus
can't be applied.

For example, `<a data-jwplayer-autostart="true"
href="https://some.stream.org/functional.webm">functional.webm</a>` will
make player start playing video automatically on page load.

#### Subtitles

You can use _data-jwplayer-subtitles_ attribute to add subtitles: `<a
href="https://some.stream.org/functional.mp4"
data-jwplayer-subtitles="English:
http://someurl.org/tracks/functional.txt"
data-jwplayer-description="some description">test subtitles</a>`

### Default player dimentions

The player default width is defined in Manage media players page. If
responsive mode is enabled in plugin configuration, player will expand. 

### CDN JW Player version

While in self-hosted mode, choosing a different release is a matter of
downloading desired JW7 release and replacing files in ./media/player/jwplayer/jwplayer,
cloud-hosted version is using a constant to determine the version to use in
JW Player CDN. Plugin is using the most recent stable version of JW Player
[available](https://developer.jwplayer.com/jw-player/docs/developer-guide/release_notes/release_notes_7/)
at release time, however if different version is required, it can be
specified using `MEDIA_JWPLAYER_CLOUD_VERSION` constant defined in Moodle
`config.php`, e.g. `define('MEDIA_JWPLAYER_CLOUD_VERSION', '7.12.1');` will
make plugin using player version 7.12.1.

When changing version, makes sure it exists in CDN by substituting version
number in the URL and testing its availability in the browser, e.g.
<https://ssl.p.jwpcdn.com/player/v/7.12.1/jwplayer.js>

<?php
/**
 * Internationalization helper.
 *
 * @package     Kirki
 * @category    Core
 * @author      Aristeides Stathopoulos
 * @copyright   Copyright (c) 2016, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       1.0
 */

if ( ! class_exists( 'Kirki_l10n' ) ) {

	/**
	 * Handles translations
	 */
	class Kirki_l10n {

		/**
		 * The plugin textdomain
		 *
		 * @access protected
		 * @var string
		 */
		protected $textdomain = 'brawny';

		/**
		 * The class constructor.
		 * Adds actions & filters to handle the rest of the methods.
		 *
		 * @access public
		 */
		public function __construct() {

			add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );

		}

		/**
		 * Load the plugin textdomain
		 *
		 * @access public
		 */
		public function load_textdomain() {

			if ( null !== $this->get_path() ) {
				load_textdomain( $this->textdomain, $this->get_path() );
			}
			load_plugin_textdomain( $this->textdomain, false, Kirki::$path . '/languages' );

		}

		/**
		 * Gets the path to a translation file.
		 *
		 * @access protected
		 * @return string Absolute path to the translation file.
		 */
		protected function get_path() {
			$path_found = false;
			$found_path = null;
			foreach ( $this->get_paths() as $path ) {
				if ( $path_found ) {
					continue;
				}
				$path = wp_normalize_path( $path );
				if ( file_exists( $path ) ) {
					$path_found = true;
					$found_path = $path;
				}
			}

			return $found_path;

		}

		/**
		 * Returns an array of paths where translation files may be located.
		 *
		 * @access protected
		 * @return array
		 */
		protected function get_paths() {

			return array(
				WP_LANG_DIR . '/' . $this->textdomain . '-' . get_locale() . '.mo',
				Kirki::$path . '/languages/' . $this->textdomain . '-' . get_locale() . '.mo',
			);

		}

		/**
		 * Shortcut method to get the translation strings
		 *
		 * @static
		 * @access public
		 * @param string $config_id The config ID. See Kirki_Config.
		 * @return array
		 */
		public static function get_strings( $config_id = 'global' ) {

			$translation_strings = array(
				'background-color'      => esc_attr__( 'Background Color', 'brawny' ),
				'background-image'      => esc_attr__( 'Background Image', 'brawny' ),
				'no-repeat'             => esc_attr__( 'No Repeat', 'brawny' ),
				'repeat-all'            => esc_attr__( 'Repeat All', 'brawny' ),
				'repeat-x'              => esc_attr__( 'Repeat Horizontally', 'brawny' ),
				'repeat-y'              => esc_attr__( 'Repeat Vertically', 'brawny' ),
				'inherit'               => esc_attr__( 'Inherit', 'brawny' ),
				'background-repeat'     => esc_attr__( 'Background Repeat', 'brawny' ),
				'cover'                 => esc_attr__( 'Cover', 'brawny' ),
				'contain'               => esc_attr__( 'Contain', 'brawny' ),
				'background-size'       => esc_attr__( 'Background Size', 'brawny' ),
				'fixed'                 => esc_attr__( 'Fixed', 'brawny' ),
				'scroll'                => esc_attr__( 'Scroll', 'brawny' ),
				'background-attachment' => esc_attr__( 'Background Attachment', 'brawny' ),
				'left-top'              => esc_attr__( 'Left Top', 'brawny' ),
				'left-center'           => esc_attr__( 'Left Center', 'brawny' ),
				'left-bottom'           => esc_attr__( 'Left Bottom', 'brawny' ),
				'right-top'             => esc_attr__( 'Right Top', 'brawny' ),
				'right-center'          => esc_attr__( 'Right Center', 'brawny' ),
				'right-bottom'          => esc_attr__( 'Right Bottom', 'brawny' ),
				'center-top'            => esc_attr__( 'Center Top', 'brawny' ),
				'center-center'         => esc_attr__( 'Center Center', 'brawny' ),
				'center-bottom'         => esc_attr__( 'Center Bottom', 'brawny' ),
				'background-position'   => esc_attr__( 'Background Position', 'brawny' ),
				'background-opacity'    => esc_attr__( 'Background Opacity', 'brawny' ),
				'on'                    => esc_attr__( 'ON', 'brawny' ),
				'off'                   => esc_attr__( 'OFF', 'brawny' ),
				'all'                   => esc_attr__( 'All', 'brawny' ),
				'cyrillic'              => esc_attr__( 'Cyrillic', 'brawny' ),
				'cyrillic-ext'          => esc_attr__( 'Cyrillic Extended', 'brawny' ),
				'devanagari'            => esc_attr__( 'Devanagari', 'brawny' ),
				'greek'                 => esc_attr__( 'Greek', 'brawny' ),
				'greek-ext'             => esc_attr__( 'Greek Extended', 'brawny' ),
				'khmer'                 => esc_attr__( 'Khmer', 'brawny' ),
				'latin'                 => esc_attr__( 'Latin', 'brawny' ),
				'latin-ext'             => esc_attr__( 'Latin Extended', 'brawny' ),
				'vietnamese'            => esc_attr__( 'Vietnamese', 'brawny' ),
				'hebrew'                => esc_attr__( 'Hebrew', 'brawny' ),
				'arabic'                => esc_attr__( 'Arabic', 'brawny' ),
				'bengali'               => esc_attr__( 'Bengali', 'brawny' ),
				'gujarati'              => esc_attr__( 'Gujarati', 'brawny' ),
				'tamil'                 => esc_attr__( 'Tamil', 'brawny' ),
				'telugu'                => esc_attr__( 'Telugu', 'brawny' ),
				'thai'                  => esc_attr__( 'Thai', 'brawny' ),
				'serif'                 => _x( 'Serif', 'font style', 'brawny' ),
				'sans-serif'            => _x( 'Sans Serif', 'font style', 'brawny' ),
				'monospace'             => _x( 'Monospace', 'font style', 'brawny' ),
				'font-family'           => esc_attr__( 'Font Family', 'brawny' ),
				'font-size'             => esc_attr__( 'Font Size', 'brawny' ),
				'font-weight'           => esc_attr__( 'Font Weight', 'brawny' ),
				'line-height'           => esc_attr__( 'Line Height', 'brawny' ),
				'font-style'            => esc_attr__( 'Font Style', 'brawny' ),
				'letter-spacing'        => esc_attr__( 'Letter Spacing', 'brawny' ),
				'top'                   => esc_attr__( 'Top', 'brawny' ),
				'bottom'                => esc_attr__( 'Bottom', 'brawny' ),
				'left'                  => esc_attr__( 'Left', 'brawny' ),
				'right'                 => esc_attr__( 'Right', 'brawny' ),
				'center'                => esc_attr__( 'Center', 'brawny' ),
				'justify'               => esc_attr__( 'Justify', 'brawny' ),
				'color'                 => esc_attr__( 'Color', 'brawny' ),
				'add-image'             => esc_attr__( 'Add Image', 'brawny' ),
				'change-image'          => esc_attr__( 'Change Image', 'brawny' ),
				'no-image-selected'     => esc_attr__( 'No Image Selected', 'brawny' ),
				'add-file'              => esc_attr__( 'Add File', 'brawny' ),
				'change-file'           => esc_attr__( 'Change File', 'brawny' ),
				'no-file-selected'      => esc_attr__( 'No File Selected', 'brawny' ),
				'remove'                => esc_attr__( 'Remove', 'brawny' ),
				'select-font-family'    => esc_attr__( 'Select a font-family', 'brawny' ),
				'variant'               => esc_attr__( 'Variant', 'brawny' ),
				'subsets'               => esc_attr__( 'Subset', 'brawny' ),
				'size'                  => esc_attr__( 'Size', 'brawny' ),
				'height'                => esc_attr__( 'Height', 'brawny' ),
				'spacing'               => esc_attr__( 'Spacing', 'brawny' ),
				'ultra-light'           => esc_attr__( 'Ultra-Light 100', 'brawny' ),
				'ultra-light-italic'    => esc_attr__( 'Ultra-Light 100 Italic', 'brawny' ),
				'light'                 => esc_attr__( 'Light 200', 'brawny' ),
				'light-italic'          => esc_attr__( 'Light 200 Italic', 'brawny' ),
				'book'                  => esc_attr__( 'Book 300', 'brawny' ),
				'book-italic'           => esc_attr__( 'Book 300 Italic', 'brawny' ),
				'regular'               => esc_attr__( 'Normal 400', 'brawny' ),
				'italic'                => esc_attr__( 'Normal 400 Italic', 'brawny' ),
				'medium'                => esc_attr__( 'Medium 500', 'brawny' ),
				'medium-italic'         => esc_attr__( 'Medium 500 Italic', 'brawny' ),
				'semi-bold'             => esc_attr__( 'Semi-Bold 600', 'brawny' ),
				'semi-bold-italic'      => esc_attr__( 'Semi-Bold 600 Italic', 'brawny' ),
				'bold'                  => esc_attr__( 'Bold 700', 'brawny' ),
				'bold-italic'           => esc_attr__( 'Bold 700 Italic', 'brawny' ),
				'extra-bold'            => esc_attr__( 'Extra-Bold 800', 'brawny' ),
				'extra-bold-italic'     => esc_attr__( 'Extra-Bold 800 Italic', 'brawny' ),
				'ultra-bold'            => esc_attr__( 'Ultra-Bold 900', 'brawny' ),
				'ultra-bold-italic'     => esc_attr__( 'Ultra-Bold 900 Italic', 'brawny' ),
				'invalid-value'         => esc_attr__( 'Invalid Value', 'brawny' ),
				'add-new'           	=> esc_attr__( 'Add new', 'brawny' ),
				'row'           		=> esc_attr__( 'row', 'brawny' ),
				'limit-rows'            => esc_attr__( 'Limit: %s rows', 'brawny' ),
				'open-section'          => esc_attr__( 'Press return or enter to open this section', 'brawny' ),
				'back'                  => esc_attr__( 'Back', 'brawny' ),
				'reset-with-icon'       => sprintf( esc_attr__( '%s Reset', 'brawny' ), '<span class="dashicons dashicons-image-rotate"></span>' ),
				'text-align'            => esc_attr__( 'Text Align', 'brawny' ),
				'text-transform'        => esc_attr__( 'Text Transform', 'brawny' ),
				'none'                  => esc_attr__( 'None', 'brawny' ),
				'capitalize'            => esc_attr__( 'Capitalize', 'brawny' ),
				'uppercase'             => esc_attr__( 'Uppercase', 'brawny' ),
				'lowercase'             => esc_attr__( 'Lowercase', 'brawny' ),
				'initial'               => esc_attr__( 'Initial', 'brawny' ),
				'select-page'           => esc_attr__( 'Select a Page', 'brawny' ),
				'open-editor'           => esc_attr__( 'Open Editor', 'brawny' ),
				'close-editor'          => esc_attr__( 'Close Editor', 'brawny' ),
				'switch-editor'         => esc_attr__( 'Switch Editor', 'brawny' ),
				'hex-value'             => esc_attr__( 'Hex Value', 'brawny' ),
			);

			$config = apply_filters( 'kirki/config', array() );

			if ( isset( $config['i18n'] ) ) {
				$translation_strings = wp_parse_args( $config['i18n'], $translation_strings );
			}

			return apply_filters( 'kirki/' . $config_id . '/l10n', $translation_strings );

		}
	}
}

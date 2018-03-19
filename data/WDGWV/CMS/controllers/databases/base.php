<?php
namespace WDGWV\CMS\controllers\databases;

class base {
	private $CMSConfig = null;

	private function __construct() {
		$this->CMSConfig = (new \WDGWV\CMS\Config());
		print_r($this->CMSConfig);
		if (isset($_GET['resetDatabase']) && $this->CMSConfig->debug) {
			array_map('unlink', glob("./data/database/*.db"));
		}
	}

	protected function noop() {

	}

	protected function generateUserDB() {
		return array(
			array(
				'username' => 'System', /* Dummy account. impossible to login to it. */
				'password' => hash('sha256', 'System@' . time() . '@' . uniqid()),
				'userlevel' => 'system',
				'is_activated' => false,
				'email' => 'CMS@wdgwv.com',
			),
		);
	}

	protected function generateSystemDB() {
		return array(
			'installed' => time(),
			'theme' => 'portal',
			'language' => 'en_US',
			'userlevels' => array('guest', 'member', 'vip', 'moderator', 'writer', 'custom', 'admin', 'root', 'system'),
		);
	}

	protected function generateMenuDB() {
		if (!isset($this->CMSConfig)) {
			$this->CMSConfig = (new \WDGWV\CMS\Config());
		}

		return array(
			array(
				'name' => 'Home',
				'icon' => 'home',
				'url' => '/home',
				'userlevel' => '*',
				'submenu' => null,
			),
			array(
				'name' => 'Blog',
				'icon' => 'pencil',
				'url' => '/blog',
				'userlevel' => '*',
				'submenu' => array(
					array(
						'name' => 'Blog',
						'url' => '/blog',
						'icon' => 'pencil',
					),
					array(
						'name' => 'Last post',
						'url' => '/blog/last',
						'icon' => 'rss',
					),
				),
			),
			array(
				'name' => 'Administration',
				'url' => '#',
				'icon' => 'cogs',
				'userlevel' => 'moderator',
				'submenu' => array(
					array(
						'name' => 'Create Post',
						'url' => sprintf('/%s/createPost', $this->CMSConfig->adminURL()),
						'icon' => 'pencil',
					),
					array(
						'name' => 'Edit Post',
						'url' => sprintf('/%s/editPost', $this->CMSConfig->adminURL()),
						'icon' => 'pencil',
					),
					array(
						'name' => 'Create Page',
						'url' => sprintf('/%s/createPage', $this->CMSConfig->adminURL()),
						'icon' => 'pencil'),
					array(
						'name' => 'Edit Page',
						'url' => sprintf('/%s/editPage', $this->CMSConfig->adminURL()),
						'icon' => 'pencil',
					),

					array(
						'name' => ' ',
					),
					($this->CMSConfig->debug) ? array(
						'name' => 'reset DB',
						'url' => sprintf('/%s/?resetDatabase', $this->CMSConfig->adminURL()),
					) : $this->noop(),

					array(
						'name' => 'Update (%s)',
						'url' => sprintf('/%s/update', $this->CMSConfig->adminURL()),
						'icon' => 'cogs',
					),
				), //.. later
			),
			array(
				'name' => 'About',
				'url' => '/about',
				'icon' => 'address-card-o',
			),
		);
	}

}
?>
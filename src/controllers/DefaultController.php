<?php
/**
 * Isolate plugin for Craft CMS 3.x
 *
 * Force users to only access a subset of your entries
 *
 * @link      https://trendyminds.com
 * @copyright Copyright (c) 2019 TrendyMinds
 */

namespace trendyminds\isolate\controllers;

use trendyminds\isolate\Isolate;

use Craft;
use craft\web\Controller;
use craft\services\UserPermissions;

/**
 * @author    TrendyMinds
 * @package   Isolate
 * @since     1.0.0
 */
class DefaultController extends Controller
{

    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     *         The actions must be in 'kebab-case'
     * @access protected
     */
    protected $allowAnonymous = [
        'index',
        'users',
        'getUser',
        'help'
    ];

    // Public Methods
    // =========================================================================

    /**
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->renderTemplate('isolate/index');
    }

    /**
     * @return mixed
     */
    public function actionUsers()
    {
        return $this->renderTemplate('isolate/users');
    }

    /**
     * @return mixed
     */
    public function actionGetUser(int $userId)
    {
        $user = Isolate::$plugin->isolateService->getUser($userId);
        $sections = Isolate::$plugin->isolateService->getUserSections($userId);

        return $this->renderTemplate('isolate/users', [
            "user" => $user,
            "sections" => $sections
        ]);
    }

    /**
     * @return mixed
     */
    public function actionHelp()
    {
        return $this->renderTemplate('isolate/help');
    }
}

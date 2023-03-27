<?php
/**
 * Isolate plugin for Craft CMS 3.x
 *
 * Force users to only access a subset of your entries
 *
 * @link      https://trendyminds.com
 * @copyright Copyright (c) 2019 TrendyMinds
 */

namespace trendyminds\isolate\records;

use trendyminds\isolate\Isolate;

use Craft;
use craft\db\ActiveRecord;

class IsolateAssetRecord extends ActiveRecord
{
	// Public Static Methods
	// =========================================================================
	
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return '{{%isolate_permissions_assets}}';
	}
}

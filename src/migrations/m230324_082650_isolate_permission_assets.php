<?php

namespace trendyminds\isolate\migrations;

use Craft;
use craft\db\Migration;

/**
 * m230324_082650_isolate_permission_assets migration.
 */
class m230324_082650_isolate_permission_assets extends Migration
{
	
	/**
	 * @var string The database driver to use
	 */
	public $driver;
	
    /**
     * @inheritdoc
     */
    public function safeUp(): bool
    {
	    $this->driver = Craft::$app->getConfig()->getDb()->driver;
	
	    if ($this->createTables()) {
		    $this->createIndexes();
		    Craft::$app->db->schema->refresh();
	    }

        return true;
    }
	
	/**
	 * @return bool
	 */
	protected function createTables()
	{
		$tablesCreated = false;
		
		
		$tableSchema_assets = Craft::$app->db->schema->getTableSchema('{{%isolate_permissions_assets}}');
		
		if ($tableSchema_assets === null) {
			$tablesCreated = true;
			
			$this->createTable('{{%isolate_permissions_assets}}', [
				'id' => $this->primaryKey(),
				'userId' => $this->integer()->notNull(),
				'assetsId' => $this->integer()->notNull(),
				'dateCreated' => $this->dateTime()->notNull(),
				'dateUpdated' => $this->dateTime()->notNull(),
				'uid' => $this->uid()
			]);
		}
		
		return $tablesCreated;
	}
	
	/**
	 * @return void
	 */
	protected function createIndexes()
	{
		// Additional commands depending on the db driver
		switch ($this->driver) {
			case DbConfig::DRIVER_MYSQL:
				break;
			case DbConfig::DRIVER_PGSQL:
				break;
		}
	}

    /**
     * @inheritdoc
     */
    public function safeDown(): bool
    {
        echo "m230324_082650_isolate_permission_assets cannot be reverted.\n";
        return false;
    }
}

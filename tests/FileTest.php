<?php

/*
 * This file is part of the Cache package.
 *
 * Copyright (c) Daniel González
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Daniel González <daniel@desarrolla2.com>
 */

namespace Desarrolla2\Test\Cache;

use Desarrolla2\Cache\FlatFile as FileCache;

/**
 * FileTest
 */
class FileTest extends AbstractCacheTest
{
    public function setUp()
    {
        parent::setup();
        $this->cache = new FileCache($this->config['file']['dir']);
    }

    /**
     * No sleep
     */
    protected static function sleep($seconds)
    {
        return;
    }

    /**
     * @return array
     */
    public function dataProviderForOptionsException()
    {
        return array(
            array('ttl', 0, '\Desarrolla2\Cache\Exception\InvalidArgumentException')
        );
    }

    /**
     * Remove all temp dir with cache files
     */
    public function tearDown() 
    {
        array_map('unlink', glob($this->config['file']['dir']."/*"));
        rmdir($this->config['file']['dir']);
    }
}

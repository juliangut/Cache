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

use Desarrolla2\Cache\PhpFile as PhpFileCache;
use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;

/**
 * FileTest with PhpPacker
 */
class PhpFileTest extends AbstractCacheTest
{
    /**
     * @var vfsStreamDirectory
     */
    private $root;

    protected $skippedTests = [
        'testBasicUsageWithLongKey' => 'Only support keys up to 64 bytes'
    ];

    public function setUp()
    {
        $this->root = vfsStream::setup('cache');

        parent::setUp();
    }

    public function createSimpleCache()
    {
        return new PhpFileCache(vfsStream::url('cache'));
    }


    public function tearDown()
    {
        // No need to clear all files, as the virtual filesystem is cleared after each test.
    }
}

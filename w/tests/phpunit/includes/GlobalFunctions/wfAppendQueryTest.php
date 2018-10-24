<?php

/**
 * @group GlobalFunctions
 * @covers ::wfAppendQuery
 */
class WfAppendQueryTest extends MediaWikiTestCase {
	/**
	 * @dataProvider provideAppendQuery
	 */
	public function testAppendQuery( $url, $query, $expected, $message = null ) {
		$this->assertEquals( $expected, wfAppendQuery( $url, $query ), $message );
	}

	public static function provideAppendQuery() {
		return [
			[
				'http://www.example.org/index.phtml',
				'',
				'http://www.example.org/index.phtml',
				'No query'
			],
			[
				'http://www.example.org/index.phtml',
				[ 'foo' => 'bar' ],
				'http://www.example.org/index.phtml?foo=bar',
				'Set query array'
			],
			[
				'http://www.example.org/index.phtml?foz=baz',
				'foo=bar',
				'http://www.example.org/index.phtml?foz=baz&foo=bar',
				'Set query string'
			],
			[
				'http://www.example.org/index.phtml?foo=bar',
				'',
				'http://www.example.org/index.phtml?foo=bar',
				'Empty string with query'
			],
			[
				'http://www.example.org/index.phtml?foo=bar',
				[ 'baz' => 'quux' ],
				'http://www.example.org/index.phtml?foo=bar&baz=quux',
				'Add query array'
			],
			[
				'http://www.example.org/index.phtml?foo=bar',
				'baz=quux',
				'http://www.example.org/index.phtml?foo=bar&baz=quux',
				'Add query string'
			],
			[
				'http://www.example.org/index.phtml?foo=bar',
				[ 'baz' => 'quux', 'foo' => 'baz' ],
				'http://www.example.org/index.phtml?foo=bar&baz=quux&foo=baz',
				'Modify query array'
			],
			[
				'http://www.example.org/index.phtml?foo=bar',
				'baz=quux&foo=baz',
				'http://www.example.org/index.phtml?foo=bar&baz=quux&foo=baz',
				'Modify query string'
			],
			[
				'http://www.example.org/index.phtml#baz',
				'foo=bar',
				'http://www.example.org/index.phtml?foo=bar#baz',
				'URL with fragment'
			],
			[
				'http://www.example.org/index.phtml?foo=bar#baz',
				'quux=blah',
				'http://www.example.org/index.phtml?foo=bar&quux=blah#baz',
				'URL with query string and fragment'
			]
		];
	}
}

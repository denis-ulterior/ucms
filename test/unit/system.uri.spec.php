<?php

use System\config;
use System\request\server;
use System\uri;

describe('uri', function () {
    it('should get a path relative to the application', function () {
        expect(uri::to('/style.css'))
            ->to->equal('/style.css');

        config::set('app.url', '/cms');

        expect(uri::to('/style.css'))
            ->to->equal('/cms/style.css');
    });

    it('should get a full path', function () {
        $_SERVER['HTTP_HOST'] = 'localhost';
        config::set('app.url', '/cms');
        config::set('app.index', 'index.php?route=');

        expect(uri::full('metadata'))
            ->to->equal('http://localhost/cms/index.php?route=/metadata');
    });

    it('should get a full path with HTTPS', function () {
        $_SERVER['HTTP_HOST'] = 'localhost';
        config::set('app.url', '/cms');
        config::set('app.index', 'index.php?route=');

        expect(uri::full('metadata', true))
            ->to->equal('https://localhost/cms/index.php?route=/metadata');
    });

    it('should get a secure path', function () {
        $_SERVER['HTTP_HOST'] = 'localhost';
        config::set('app.url', '/cms');
        config::set('app.index', 'index.php?route=');

        expect(uri::secure('foo'))
            ->to->equal('https://localhost/cms/index.php?route=/foo');
    });

    it('should throw on an undetectable URI', function () {
        expect(function () {
            return uri::current();
        })
            ->to->throw(OverflowException::class);
    });

    // TODO: Ask Kieron on how to even trigger the malformed URI error, I really tried hard to make it
    // throw up, but it wouldn't.
    xit('should throw on a malformed URI (cannot make it throw at all)', function () {
        $_SERVER['REQUEST_URI']    = new ArrayObject();
        $_SERVER['PATH_INFO']      = null;
        $_SERVER['ORIG_PATH_INFO'] = null;

        expect(function () {
            return uri::detect();
        })
            ->to->throw(ErrorException::class);
    });

    it('should detect the current URI', function () {
        $_SERVER['REQUEST_URI'] = '/foo/bar';

        expect(uri::current())
            ->to->equal('foo/bar');
    });

    it('should sanitize a URI', function () {
        expect(uri::format("https://localhost/cms/index.php & foo ??????  = ///", new server($_SERVER)))
            ->to->equal('https://localhost/cms/index.php&foo=');
    });

    describe('URI string manipulation', function () {
        it('should remove a value from a URI', function () {
            expect(uri::remove('/foo', '/foo/bar'))
                ->to->equal('/bar');
        });

        it('should return any arguments with a wrong type on remove', function () {
            expect(uri::remove([], []))
                ->to->be->loosely->equal([]);

            expect(uri::remove([], 'foo'))
                ->to->be->equal('foo');
        });

        it('should remove the script name from a URI', function () {
            $_SERVER['SCRIPT_NAME'] = 'index.php?route=';

            expect(uri::remove_script_name('index.php?route=/foo/bar', new server($_SERVER)))
                ->to->equal('/foo/bar');
        });

        it('should remove the relative path from a URI', function () {
            $_SERVER['HTTP_HOST'] = 'localhost';
            config::set('app.url', '/cms');
            config::set('app.index', 'index.php?route=');

            expect(uri::remove_relative_uri('/cms/index.php?route=/foo/bar'))
                ->to->equal('/foo/bar');
        });
    });
});

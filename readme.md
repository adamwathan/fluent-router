Not even anything yet. Hopefully will soon be a nice light wrapper around the Laravel router that provides a fluent interface instead of that crappy array.

```php
Route::get('foo', ['uses' => 'FooController@bar', 'as' => 'bananas', 'before' => 'auth']);

// vs.

Route::get('foo')->uses('FooController@bar')->as('bananas')->before('auth');
```

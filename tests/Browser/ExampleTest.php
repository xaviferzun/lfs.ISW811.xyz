<?php

test('the application returns a successful response', function () {
    visit('/')->assertSee('Welcome');
});
  
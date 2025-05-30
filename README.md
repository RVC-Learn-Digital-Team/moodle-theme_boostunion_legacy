# Boost Union Legacy (theme_boostunion_legacy)

A minimal grand‑child of Boost that wraps legacy Bootstrap‑2 based courses in a
`.legacy-course` namespace so that 2010‑era CSS can coexist with Bootstrap 5.

* Parent theme: **Boost Union**
* Moodle version: 4.5+
* PHP: 8.0+

## Installation
1. Copy this folder to `theme/boostunion_legacy`.
2. Run Site administration → Notifications.
3. Assign the theme per‑course or per‑category.

## SCSS

### SCSS workflow
Edit `scss/legacy.scss` only.  Keep everything under `.legacy-course {}`.
Run `grunt css` (or `npm run scss`) to lint before committing.

### SCSS paste area
SCSS can be pasted into the theme to run whenever this theme is used.  It is applied after all other SCSS.

## Javascript text area in theme configuration

Javascript can be pasted into the theme to run whenever this theme is used.

### Javascript paste notes
Example javascript self invoking function
```js
(function() {
  // Example – convert .span6 → .col-md-6 only on legacy courses
  if (!document.body.classList.contains('legacy-course')) { return; }

  document.querySelectorAll('.span6').forEach(el => {
    el.classList.remove('span6');
    el.classList.add('col-md-6');
  });
})();
```

Useful for testing
```js
(function() {
  // Example – debug whether or not legacy-course exists
  if (document.body.classList.contains('legacy-course')) {
     console.log("Legacy Course Found Here");
  } else {
     console.log("No Legacy Course On This Page");
  }

})();
```

### What not to do
Don’t paste ES-module import statements directly—js_init_code is evaluated inside RequireJS, not an ES-module context.
If you need a larger script, drop it in /javascript/extra.js and paste only:

```js
require(['theme_boostunion_legacy/extra'], function(mod) { mod.init(); });
```

Don’t rely on jQuery’s global $ without wrapping it: jQuery is loaded late on some pages in 4.x. Instead:

```js
require(['jquery'], function($) {
  // safe to use $
});
```

Don’t reference variables from legacy.scss—remember CSS and JS compile separately.
# Guidelines for Grid

These guidelines clarifies how to setup the grid with support for multiple layouts in Drupal 7.

### CSS-over-markup approach

Each layout has a coressponding class. For example a layout with 3 column wide sidebar and 9 column wide main content would be described as `layout-3-9` and would be appended to the `body` tag.

This convention is easier to maintain than "responsive classes" (e.g. `col-sm-3 col-lg-4 col-xs-12`) and makes it a lot more convinent to change grid settings in CSS. Here's an example using Susy

    // 9 column wide main, 3 column wide side
    .layout-3-9 {
       .main {
            @include span(9 of 12);
        }

        .sidebar {
            @include span(3 of 12);
        }
    }

The markup defines which side the sidebar floats to

    <div class="main" role="main">
    </div>

    <div class="sidebar" role="complementary">
    </div>

This approach is cleaner than the second approach, because it doesn't add the bloat of classes.

### Markup-over-CSS approach

This method is less ideal, since it is harder to maintain. This is how the CSS could look like:

    .col-sm-3 { 
        @span(3 of 12);
    }
    .col-sm-9 {
        @span(9 of 12);
    }

    .col-lg-4 {
        @span (4 of 12);    
    }

    .col-xs-12 { @span(12 of 12); }

and the markup would be similar to:

    <div class="main col-sm-9 col-xs-12" role="main">
    </div>

    <div class="sidebar col-sm-3 col-xs-12" role="complementary">
    </div>

As you can see, this will add a lot of bloat to the markup, which is omitted using the first approach.


###### This document is a work-in-progress.

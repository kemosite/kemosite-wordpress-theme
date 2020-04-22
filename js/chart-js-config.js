Chart.helpers.merge(Chart.defaults.global, {
  elements: {
    rectangle: {
      backgroundColor: kemosite_wordpress_theme_chart_colours.primary_bright_color,
      borderColor: kemosite_wordpress_theme_chart_colours.primary_dark_color,
      borderWidth: 2
    }
  },
  datasets: {
    bar: {
      backgroundColor: kemosite_wordpress_theme_chart_colours.primary_bright_color,
      borderColor: kemosite_wordpress_theme_chart_colours.primary_dark_color,
      borderWidth: 2
    }
  }
});

Chart.defaults._set('global', {
  elements: {
    rectangle: {
      backgroundColor: kemosite_wordpress_theme_chart_colours.primary_bright_color,
      borderColor: kemosite_wordpress_theme_chart_colours.primary_dark_color,
      borderWidth: 2
    }
  },
  datasets: {
    bar: {
      backgroundColor: kemosite_wordpress_theme_chart_colours.primary_bright_color,
      borderColor: kemosite_wordpress_theme_chart_colours.primary_dark_color,
      borderWidth: 2
    }
  }
});

Chart.defaults.global.defaultFontColor = kemosite_wordpress_theme_chart_colours.black_tint;
Chart.defaults.global.defaultColor = kemosite_wordpress_theme_chart_colours.primary_dark_color;
Chart.defaults.global.backgroundColor = kemosite_wordpress_theme_chart_colours.primary_bright_color;
Chart.defaults.global.borderColor = kemosite_wordpress_theme_chart_colours.primary_dark_color;
Chart.defaults.global.borderWidth = 1;

Chart.defaults.global.tooltips.backgroundColor = kemosite_wordpress_theme_chart_colours.dark_black_tint;
Chart.defaults.global.hover.animationDuration = 500;

Chart.defaults.global.elements.line.backgroundColor = kemosite_wordpress_theme_chart_colours.primary_bright_color;
Chart.defaults.global.elements.line.borderColor = kemosite_wordpress_theme_chart_colours.primary_dark_color;
Chart.defaults.global.elements.line.borderWidth = 3;

Chart.defaults.global.elements.rectangle.backgroundColor = kemosite_wordpress_theme_chart_colours.primary_bright_color;
Chart.defaults.global.elements.rectangle.borderColor = kemosite_wordpress_theme_chart_colours.primary_dark_color;
Chart.defaults.global.elements.rectangle.borderWidth = 2;

Chart.defaults.global.elements.arc.backgroundColor = kemosite_wordpress_theme_chart_colours.primary_bright_color;
Chart.defaults.global.elements.arc.borderColor = kemosite_wordpress_theme_chart_colours.primary_dark_color;
Chart.defaults.global.elements.arc.borderWidth = 1;

if (Chart.defaults.global.datasets.bar) {
	Chart.defaults.global.datasets.bar.backgroundColor = kemosite_wordpress_theme_chart_colours.primary_bright_color;
	Chart.defaults.global.datasets.bar.borderColor = kemosite_wordpress_theme_chart_colours.primary_dark_color;
	Chart.defaults.global.datasets.bar.borderWidth = 2;
}

if (Chart.defaults.global.datasets.line) {
	Chart.defaults.global.datasets.line.borderColor = kemosite_wordpress_theme_chart_colours.primary_dark_color;
}

// console.log(Chart.defaults.global);
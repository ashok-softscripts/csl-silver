<!--[if lte IE 7]>      <html class="no-js lt-ie10 lt-ie9 lt-ie8 no-mediaqueries"> <![endif]-->
<!--[if IE 8]>          <html class="no-js lt-ie10 lt-ie9 no-mediaqueries"> <![endif]-->
<!--[if IE 9]>          <html class="no-js lt-ie10"> <![endif]-->
<!--[if gte IE 9]>      <html class="no-js"> <![endif]-->
<!--[if !IE]> -->       <html class="no-js"><!-- <![endif]-->
<head>
    <% base_tag %>

    <meta charset="utf-8">
    <%--<title><% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> &raquo; $SiteConfig.Title</title>--%>

	  <% if ClassName == Homepage %>
		  <title>$SiteConfig.Title | $SiteConfig.Tagline</title>
	  <% else %>
		  <title><% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> | $SiteConfig.Title | $SiteConfig.Tagline</title>
	  <% end_if %>

    <% if $MetaDescription %>
        <meta name="description" content="$MetaDescription">
    <% else %>
        <meta name="description" content="$SiteConfig.Tagline">
    <% end_if %>

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <link rel="apple-touch-icon" sizes="57x57" href="$ThemeDir/images/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="114x114" href="$ThemeDir/images/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="$ThemeDir/images/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="144x144" href="$ThemeDir/images/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="60x60" href="$ThemeDir/images/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="120x120" href="$ThemeDir/images/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="76x76" href="$ThemeDir/images/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="152x152" href="$ThemeDir/images/favicons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="$ThemeDir/images/favicons/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="$ThemeDir/images/favicons/favicon-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="$ThemeDir/images/favicons/favicon-160x160.png" sizes="160x160">
    <link rel="icon" type="image/png" href="$ThemeDir/images/favicons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="$ThemeDir/images/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="$ThemeDir/images/favicons/favicon-32x32.png" sizes="32x32">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="$ThemeDir/images/favicons/mstile-144x144.png">

    <!--<meta name="google-site-verification" content="260DFGt9n_cSNOuiPYle3n8Hc8LqR08H5xUym5SiqGc" />-->


    <meta property="og:title" content="$Title" />
    <% if Description %>
    <meta property="og:description" content="$Description" />
    <% else %>
    <meta property="og:description" content="$MetaDescription" />
    <% end_if %>
    <meta property="og:url" content="$AbsoluteLink" />
    <% if Thumbnail %>
    <meta property="og:image" content="$Thumbnail.AbsoluteURL" />
    <% else %>
    <meta property="og:image" content="$BaseHref$ThemeDir/images/favicons/mstile-144x144.png" />
    <% end_if %>

    <link rel="stylesheet" href="$ThemeDir/styles/screen.css" media="screen">
    <link rel="stylesheet" href="$ThemeDir/styles/print.css" media="print">

    <script src="$ThemeDir/scripts/vendor/modernizr.js"></script>

    <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-31315015-2']);
      _gaq.push(['_setDomainName', 'studiothick.com']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>
       
</head>

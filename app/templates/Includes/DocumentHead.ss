<!doctype html>
<html lang="en" class="<% if URLSegment == 'Security' %>security-page<% end_if %>">
<head>

	<meta charset="utf-8">
	<title>$MenuTitle.XML | $SiteConfig.Title</title>
	
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scaleable=no" name="viewport" />
	
	<meta property="og:type" content="website">
	<meta property="og:url" content="{$absoluteBaseURL}{$Link}?1" />
	<meta property="og:title" content="$Title" />
	<meta property="og:description" content="$MetaDescription" />
    
	<% if OgImage %>
		<meta property="og:image" content="$OgImage.AbsoluteURL" />
    <% else %>
		<meta property="og:image" content="{$absoluteBaseURL}app/images/logo.png" />
	<% end_if %>
	
	<link rel="shortcut icon" type="image/ico" href="/app/favicon.ico" />
	<link rel="shortcut icon" type="image/x-icon" href="/app/favicon.ico" />
	<link rel="shortcut-icon" href="/app/favicon.ico" />

	<link rel="canonical" href="https://divinelaziness.com{$Link}"/>
	
	<% include GoogleAnalytics %>
	
</head>
<body class="$ClassName">

<span class="hamburglar closed">
	<span></span>
	<span></span>
	<span></span>
</span>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>component</title>
</head>
<body>

	<x-sidebar title="this is first title" :varibale="$varibale">
		<div> helo this is slot</div>
		<div> helo this is slot two</div>
		<div> helo this is slot threee</div>
	</x-sidebar>
	<x-subview />
</body>
</html>
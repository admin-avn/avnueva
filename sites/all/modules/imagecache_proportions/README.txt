;$Id: README.txt,v 1.1 2010/10/19 11:29:45 pcambra Exp $
This module provides a CCK formatter for imagefields that allows the user to select between three different imagecache presets depending on the proportions of the original image.
If the image is more or less squared (you can set a looseness in pixels) you will be able to select a squared preset, if the image is wider than higher, you can select a more "horizontal" preset and if it's higher than wider, a more "vertical" one.
It's integrated out of the box with thickbox, colorbox, shadowbox and lightbox2 for displaying full links.

Configuration
=============
- Create presets for the wider image, the higher and the squared one.
- Edit the field settings for your image field, select which imagecache preset you would like to use for each proportion and the looseness for the squard ones.
#!/bin/bash

# define colors
_color_black='\033[0;30m'
_color_red='\033[0;31m'
_color_green='\033[0;32m'
_color_brown_orange='\033[0;33m'
_color_blue='\033[0;34m'
_color_purple='\033[0;35m'
_color_foreground='\033[1;37m'


_the_path=node_modules/flatpickr/dist/flatpickr.min.js
_the_event='flat-picker-ready'

if grep -Rq $_the_event $_the_path
then
    echo -e "${_color_green}Event exists ${_color_foreground} in ${_color_blue} $_the_path ${_color_foreground}\n";
else
    echo -e "${_color_green}Adding Event ${_color_purple} $_the_event ${_color_foreground}to ${_color_blue}$_the_path ${_color_foreground} \n";
    echo "document.dispatchEvent(new Event('$_the_event'));" >> $_the_path;
fi



_the_path=node_modules/chart.js/dist/chart.min.js
_the_event='chartjs-ready'

if grep -Rq $_the_event $_the_path
then
    echo -e "${_color_green}Event exists ${_color_foreground} in ${_color_blue} $_the_path ${_color_foreground}\n";
else
    echo -e "${_color_green}Adding Event ${_color_purple} $_the_event ${_color_foreground}to ${_color_blue}$_the_path ${_color_foreground} \n";
    echo "document.dispatchEvent(new Event('$_the_event'));" >> $_the_path;
fi


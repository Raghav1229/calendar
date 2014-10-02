<?php
/**
 * ownCloud - Calendar App
 *
 * @author Raghu Nayyar
 * @author Georg Ehrke
 * @copyright 2014 Raghu Nayyar <beingminimal@gmail.com>
 * @copyright 2014 Georg Ehrke <oc.list@georgehrke.com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */
$styles = [
	'part.datepicker',
	'part.calendarlist',
	'part.settings',
	'part.events.dialog',
	'../3rdparty/fontawesome/css/font-awesome',
	'../3rdparty/fullcalendar/dist/fullcalendar',
	'../3rdparty/angular-bootstrap-colorpicker/css/colorpicker',
	'calendar',
];

foreach ($styles as $style) {
	style('calendar', $style);
}

$scripts = [
	'../3rdparty/jquery-file-upload/js/jquery.fileupload',
	'../3rdparty/ical/ical',
	//'../3rdparty/js/recurrencejs/jquery.recurrenceinput',
	'../3rdparty/jstzdetect/jstz.min',
	'../3rdparty/fullcalendar/dist/fullcalendar.min',
	'../3rdparty/angular/angular.min',
	'../3rdparty/angular-animate/angular-animate.min',
	'../3rdparty/restangular/dist/restangular.min',
	'../3rdparty/angular-route/angular-route.min',
	'../3rdparty/angular-ui/angular-ui',
	'../3rdparty/angular-ui/angular-ui-calendar',
	'../3rdparty/angular-ui/angular-ui-sortable',
	'../3rdparty/angular-bootstrap-colorpicker/js/bootstrap-colorpicker-module',
	'../3rdparty/appframework/app',
	'public/app',
];

foreach ($scripts as $script) {
	script('calendar', $script);
}
?>
<div class="app" ng-app="Calendar" ng-controller="AppController">

	<script type="text/ng-template" id="calendar.html">
		<?php print_unescaped($this->inc('part.fullcalendar')); ?>
	</script>
	<!-- The Left Calendar Navigation -->
	<div id="app-navigation">

		<div ng-controller="DatePickerController" id="datepickercontainer">
			<?php print_unescaped($this->inc('part.datepicker')); ?>
			<?php print_unescaped($this->inc('part.buttonarea')); ?>
		</div>
		<div id="scrollable">
			<div ng-controller="CalendarListController">
				<?php print_unescaped($this->inc('part.createcalendar')); ?>
				<?php print_unescaped($this->inc('part.calendarlist')); ?>
			</div>
			<div id="spacer"></div><!-- Creates space between Subscriptionlist and Calendarlist.-->
			<div ng-controller="SubscriptionController">
				<?php print_unescaped($this->inc('part.createsubscription')); ?>
				<?php print_unescaped($this->inc('part.subscriptionlist')); ?>
			</div>
		</div>

		<div id="app-settings" ng-controller="SettingsController">
			<?php print_unescaped($this->inc('part.settings')); ?>
		</div>
	</div>

	<!-- The Calendar on the right -->
	<div id="app-content" ng-class="{ loading : is.loading }">
		<div id="app-content-container" ng-view></div>
	</div>

	<!-- The Event Editor -->
	<div ng-controller="EventsModalController" id="dialoghider">
		<?php print_unescaped($this->inc('part.event.dialog')); ?>
	</div>
</div>

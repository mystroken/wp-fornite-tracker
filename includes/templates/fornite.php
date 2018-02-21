<?php
/**
 * Created by PhpStorm.
 * User: ken
 * Date: 2/21/18
 * Time: 9:10 AM
 */
if( !defined('ABSPATH') ) exit;

$forniteClient = new \FL\Fornite\ForniteClient('673b5804-c50f-424c-8381-adb10dbc02c5');
$response = $forniteClient->retrieveStats('modogameur', 'pc');
var_dump( $response ) ;

?>

<div class="dtr-stats-card pl-solo">
	<div class="dtr-stats-header">
		<div class="left">
			<h2 class="title">Solo</h2>
			<span class="subtitle">24 Matches</span>
		</div>
		<div class="right">
			<div class="stat">
				<span class="value">#1,693,954</span>
				<span class="name">Rank</span>
			</div>
			<div class="stat">
				<span class="value">
					<a href="https://fortnitetracker.com/article/23/trn-rating-you">
						<i class="ion ion-help-circled"></i>
					</a> 1
				</span>
				<span class="name">TRN Rating</span>
			</div>
		</div>
	</div>
	<div class="trn-stats">
		<div class="trn-stat">
			<div class="name">Score</div>
			<div class="value">2,537</div>
			<div data-trn-tooltip="Top 78%, 22th Percentile" class="trn-percentile-bar">
				<div class="progress" style="width: 22%;"></div>
			</div>
			<div class="rank">#1,518,695</div>
		</div>
		<div class="trn-stat">
			<div class="name">Kills</div>
			<div class="value">12</div>
			<div data-trn-tooltip="Top 80%, 20th Percentile" class="trn-percentile-bar">
				<div class="progress" style="width: 20%;"></div>
			</div>
			<div class="rank">#1,583,209</div>
		</div>
		<div class="trn-stat">
			<div class="name">Wins</div>
			<div class="value">0</div> <!----> <div class="rank">#1,022,098</div></div> <div class="trn-stat"><div class="name">Top 10</div> <div class="value">1</div> <!----> <div class="rank">#1,584,043</div></div> <div class="trn-stat"><div class="name">Top 25</div> <div class="value">5</div> <div data-trn-tooltip="Top 27%, 73th Percentile" class="trn-percentile-bar"><div class="progress" style="width: 73%;"></div></div> <div class="rank">#1,554,812</div></div> <div class="trn-stat"><div class="name">K/d</div> <div class="value" style="white-space: nowrap;">0.50</div> <div data-trn-tooltip="Top 81%, 19th Percentile" class="trn-percentile-bar"><div class="progress" style="width: 19%;"></div></div> <div class="rank">#1,682,192</div></div><div class="trn-stat"><div class="name">Time Played</div> <div class="value" style="white-space: nowrap;">2h 25m </div> <div data-trn-tooltip="Top 80%, 20th Percentile" class="trn-percentile-bar"><div class="progress" style="width: 20%;"></div></div> <div class="rank">#1,566,321</div></div><div class="trn-stat"><div class="name">Kills Per Min</div> <div class="value" style="white-space: nowrap;">0.08</div> <div data-trn-tooltip="Top 75%, 25th Percentile" class="trn-percentile-bar"><div class="progress" style="width: 25%;"></div></div> <div class="rank">#1,658,127</div></div><div class="trn-stat"><div class="name">Kills Per Match</div> <div class="value" style="white-space: nowrap;">0.50</div> <div data-trn-tooltip="Top 80%, 20th Percentile" class="trn-percentile-bar"><div class="progress" style="width: 20%;"></div></div> <div class="rank">#1,681,058</div></div><div class="trn-stat"><div class="name">Avg Match Time</div> <div class="value" style="white-space: nowrap;">6m 2s</div> <div data-trn-tooltip="Top 79%, 21th Percentile" class="trn-percentile-bar"><div class="progress" style="width: 21%;"></div></div> <div class="rank">#1,419,501</div></div><div class="trn-stat"><div class="name">Score per Match</div> <div class="value" style="white-space: nowrap;">105.71</div> <div data-trn-tooltip="Top 73%, 27th Percentile" class="trn-percentile-bar"><div class="progress" style="width: 27%;"></div></div> <div class="rank">#1,317,346</div></div><div class="trn-stat"><div class="name">Score per Minute</div> <div class="value" style="white-space: nowrap;">17.50</div> <div data-trn-tooltip="Top 67%, 33th Percentile" class="trn-percentile-bar"><div class="progress" style="width: 33%;"></div></div> <div class="rank">#1,273,069</div></div></div></div>

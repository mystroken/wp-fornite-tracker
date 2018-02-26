<?php
/**
 * Created by PhpStorm.
 * User: ken
 * Date: 2/21/18
 * Time: 9:10 AM
 */
if( !defined('ABSPATH') ) exit;

$platform = isset($platform) ? $platform : null;
$username = isset($username) ? $username : null;

$forniteClient = new \FL\Fornite\ForniteClient('673b5804-c50f-424c-8381-adb10dbc02c5');
$response = $forniteClient->retrieveStats($username, $platform);

$fp = fopen("stats.json", "w");
fwrite($fp, \GuzzleHttp\json_encode($response));
fclose($fp);


$data = json_decode(file_get_contents("stats.json"));

// Stop the script when there is an error
if( isset($data->error) && $data->error !== null ): ?>

	<div style="color:red;">
		<p><?php echo $data->error; ?></p>
	</div>

<?php
else:

	$solo = $data->stats->p2;//solos data
	$duos = $data->stats->p10;//duos data
	$squads = $data->stats->p9;//squads data

	$modeLoop = array(
		'solo'   => $solo,
		'duo'   => $duos,
		'squad' => $squads,
	);

	foreach($modeLoop as $key => $mode):

		$modeTrnRating = $mode->trnRating;
		$modeMatches = $mode->matches;

		$modeScore = $mode->score;
		$modeKills = $mode->kills;
		$modeWins = $mode->top1;
		$modeKd = $mode->kd;
		$modeTimePlayed = $mode->minutesPlayed;
		$modeKillsPerMin = $mode->kpm;
		$modeKillsPerMatch = $mode->kpg;
		$modeAvgMatchTime = $mode->avgTimePlayed;
		$modeScorePerMatch = $mode->scorePerMatch;
		$modeScorePerMin = $mode->scorePerMin;

		$modeLoop = array(
			$modeScore,
			$modeKills,
			$modeWins,
			$modeKd,
			$modeTimePlayed,
			$modeKillsPerMin,
			$modeKillsPerMatch,
			$modeAvgMatchTime,
			$modeScorePerMatch,
			$modeScorePerMin,
		); ?>

		<div class="dtr-stats-card pl-<?php echo strtolower($key); ?>">
			<div class="dtr-stats-header">
				<div class="left">
					<h2 class="title"><?php echo ucfirst($key); ?></h2>
					<span class="subtitle"><?php echo $modeMatches->valueInt; ?> Matches</span>
				</div>
				<div class="right">
					<div class="stat">
						<div class="value">
							<?php echo $modeTrnRating->valueInt; ?>
						</div>
						<div class="name"><?php echo $modeTrnRating->label; ?></div>
					</div>
				</div>
			</div>
			<div class="trn-stats">
			<?php foreach($modeLoop as $item): ?>
				<div class="trn-stat">
					<div class="name"><?php echo $item->label; ?></div>
					<div class="value"><?php echo $item->displayValue; ?></div>
					<?php if(isset($item->percentile)): ?>
					<div data-trn-tooltip="Top <?php echo $item->percentile; ?>%, <?php echo abs(100 - $item->percentile); ?>th Percentile" class="trn-percentile-bar">
						<div class="progress" style="width: <?php echo abs(100 - $item->percentile); ?>%;"></div>
					</div>
					<?php endif; ?>
					<div class="rank"></div>
				</div>
			<?php endforeach; ?>
			</div>
		</div>

<?php
	endforeach;
endif;

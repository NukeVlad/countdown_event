<!-- BEGIN: main -->
<link rel="stylesheet" type="text/css" media="screen" href="{NV_BASE_SITEURL}themes/{BLOCK_THEME}/css/su_kien.css" />
<style>
	.notice-bar-title .title-note {
		margin-top: 4px;
	}
	.notice-bar-title strong {
		font-family: 'Roboto Condensed', sans-serif;
		font-size: 16px;
		color: #333;
		text-transform: uppercase;
		font-weight: 700;
		letter-spacing: 2px;
		display: block;
	}
	.meta-data {
		display: block;
		margin-bottom: 10px;
		font-size: 12px;
		font-style: italic;
		font-family: 'Volkhov', serif;
		color: #999999;
	}
	.counter .timer-col {
		display: inline-block;
		width: 24%;
		text-align: center;
	}
	.timer-col .timer-type {
		font-size: 12px;
		display: block;
		margin-top: 2px;
		text-align: center;
	}
	.title-note, .timer-col #days {
		background-color: #007F7B;
	}
	.timer-col #days {
		color: #ffffff;
		-webkit-border-radius: 2px;
		-moz-border-radius: 2px;
		border-radius: 2px;
	}
	.timer-col #days, .timer-col #hours, .timer-col #minutes, .timer-col #seconds {
		display: inline-block;
		font-family: 'Roboto Condensed', sans-serif;
		font-size: 18px;
		padding: 5px 10px;
	}
	.timer-col #hours, .timer-col #minutes, .timer-col #seconds {
		background: #eceae4;
		-webkit-border-radius: 2px;
		-moz-border-radius: 2px;
		border-radius: 2px;
	}
	h1 a, h2 a, h3 a, h5 a.ten, h6 a {
		color: #5e5e5e;
		text-decoration: none;
		font-size: 16px;
		font-weight: 700;
	}
	.notice-bar, .page-header {
		background: #f8f7f3;
		padding: 20px 0;
		box-shadow: 0 2px 0 rgba(0,0,0,.07);
	}
	.ten, .notice-bar-title strong {
        padding: 0; /* Убираем поля */
        margin-left: 20px; /* Отступ слева */
	}

</style>

<div class="notice-bar">
	<div class="row">
		<!-- BEGIN: Описание события -->
		<div class="col-md-5 col-sm-12 col-xs-12 notice-bar-title">
			<span class="ten">Предстоящее событие:</span><strong>{DATA.name_event_countdown}</strong>
		</div>
		
		<div class="col-md-8 col-sm-12 col-xs-12 notice-bar-event-title">
			<h5><span class="ten"> До события осталось:</span></h5>
			<span class="meta-data">
				<!-- BEGIN: beginning_event -->Дата начала события:<!-- END: beginning_event -->
				<!-- BEGIN: end_event -->Дата окончания события<!-- END: end_event -->
				: Число: {DATA.ngay},Месяц: {DATA.thang} Год: {DATA.nam}</span>
		</div>

		<!-- END: Описание события -->
		<!-- BEGIN: Вывод таймера -->
		<div id="counter" class="col-md-7 col-sm-12 col-xs-24 counter" data-date="{DATA.thang} {DATA.ngay}, {DATA.nam}">
			<div class="timer-col">
				<span id="days"></span><span class="timer-type">Дни</span>
			</div>
			<div class="timer-col">
				<span id="hours"></span><span class="timer-type">Часы</span>
			</div>
			<div class="timer-col">
				<span id="minutes"></span><span class="timer-type">Минуты</span>
			</div>
			<div class="timer-col">
				<span id="seconds"></span><span class="timer-type">Секунды</span>
			</div>
		</div>

		<!-- All Scripts -->
		<script src="{NV_BASE_SITEURL}themes/{BLOCK_THEME}/js/countdown/jquery.countdown.min.js"></script>
				<script src="{NV_BASE_SITEURL}themes/{BLOCK_THEME}/js/countdown/counter.js"></script>
		<!-- Jquery Timer -->

		<!-- END: Вывод таймера -->

		<!-- BEGIN: Вывод кнопки -->
		<div class="col-md-3 col-sm-6 hidden-xs ">
			<a target="_blank" title="{DATA.link_module_redday_anchor}" href="{DATA.link_module_redday}" class="btn btn-primary btn-lg btn-block">события</a>
		</div>
		<!-- END: Вывод кнопки -->
	</div>
</div>

<!-- END: main -->
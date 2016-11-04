		<footer class="ja-footer cyan darken-1 white-text">
			<div class="uk-container uk-container-center">
				<div class="uk-grid uk-grid-divider">
					<div class="uk-width-medium-2-3">
						<ul class="uk-subnav uk-subnav-line uk-hidden-small uk-margin-bottom-remove">
							<li><a href="{!! lang_url('location-map') !!}" title="">Aquarium Map</a></li>
							<li><a href="{!! lang_url('career') !!}" title="">Career with Us</a></li>
							<li><a href="{!! lang_url('media-room') !!}" title="">Media Room</a></li>
							<li><a href="{!! lang_url('privacy-policy') !!}" title="">Privacy Policy</a></li>
							<li><a href="{!! lang_url('term-use') !!}" title="">Term of Use</a></li>
						</ul>
						<p class="uk-margin-remove">Copyright &copy; <?php echo date('Y'); ?> Jakarta Aquarium Indonesia. All Rights Reserved.</p>
					</div>
					<div class="uk-width-medium-1-3">
						Endorsed by Taman Safari Indonesia and Aquawalk Sdn. Bhd.
					</div>
				</div>
			</div>
		</footer>
		<script src="{!! asset('frontend/js/jquery.min.js') !!}"></script>
		<script src="{!! asset('frontend/js/uikit.min.js') !!}"></script>
		<script src="{!! asset('frontend/js/components/tooltip.min.js') !!}"></script>
		<script src="{!! asset('frontend/js/main.js') !!}"></script>
		@section('page-level-scripts')
		@show
	</body>
</html>

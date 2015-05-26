	
                    </div>
                </div>
            </div>

        </div>
	
    </div>
        <!-- /.container -->
	<script type="text/javascript" src="<?=base_url()?>js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="<?=base_url()?>js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
			$('.dropdown-toggle').click(function(){
				$(this).next().slideToggle();
			});
		});
	</script>

</body>
</html>
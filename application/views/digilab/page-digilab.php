<div class="row learning-block">
	<div class="col-xl-12 xl-60">
		<div class="row">
			<?php foreach ($buku as $key => $val): ?>
			<div class="col-xl-12 col-sm-6">
				<div class="card">
					<div class="blog-box blog-list row">
						<div class="col-xl-4 col-12"><img class="img-fluid sm-100-w"
								src="<?= base_url() ?>assets/img/buku/<?= $val["images"] ?>" alt=""></div>
						<div class="col-xl-8 col-12">
							<div class="blog-details p-3">
								<div class="blog-date">
								</div>
								<a href="learning-detailed.html">
									<h6><?= $val["judul_buku"] ?> </h6>
								</a>
								<div class="blog-bottom-content">
									<ul class="blog-social">
										<li>Penulis: <?= $val["penulis_buku"] ?></li>
										<li>Terbit: <?= date("Y", strtotime($val["tahun_penerbit"])) ?></li>
									</ul>
									<hr>
									<p class="mt-0"><?= $val["keterangan"] ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="col-xl-3 xl-40">
		<div class="job-sidebar"><a class="btn btn-primary job-toggle" href="javascript:void(0)">learning
				filter</a>
			<div class="job-left-aside custom-scrollbar">
				<div class="default-according style-1 faq-accordion job-accordion" id="accordionoc">
					<div class="row">
						<div class="col-xl-12">
							<div class="card">
								<div class="card-header">
									<h5 class="mb-0 p-0">
										<button class="btn btn-link" data-bs-toggle="collapse"
											data-bs-target="#collapseicon" aria-expanded="true"
											aria-controls="collapseicon">Find Course</button>
									</h5>
								</div>
								<div class="collapse show" id="collapseicon" aria-labelledby="collapseicon"
									data-bs-parent="#accordion">
									<div class="card-body filter-cards-view animate-chk">
										<div class="job-filter">
											<div class="faq-form">
												<input class="form-control" type="text" id="searchBuku" placeholder="Search.."><i
													class="search-icon" data-feather="search"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- <div class="col-xl-12">
							<div class="card">
								<div class="card-header">
									<h5 class="mb-0 p-0">
										<button class="btn btn-link" data-bs-toggle="collapse"
											data-bs-target="#collapseicon2" aria-expanded="true"
											aria-controls="collapseicon2">Upcoming Courses</button>
									</h5>
								</div>
								<div class="collapse show" id="collapseicon2" aria-labelledby="collapseicon2"
									data-bs-parent="#accordion">
									<div class="upcoming-course card-body">
										<div class="media">
											<div class="media-body"><span class="f-w-600">UX Development</span>
												<h6>Course By <a href="#"> Lorem ipsum</a></h6>
												<ul class="rating">
													<li><i class="fa fa-star font-warning"></i></li>
													<li><i class="fa fa-star font-warning"></i></li>
													<li><i class="fa fa-star font-warning"></i></li>
													<li><i class="fa fa-star font-warning"></i></li>
													<li><i class="fa fa-star-half-o font-warning"></i></li>
												</ul>
											</div>
											<div>
												<h5 class="mb-0 p-0 font-primary">18</h5><span
													class="d-block">Dec</span>
											</div>
										</div>
										<div class="media">
											<div class="media-body"><span class="f-w-600">Business Analyst</span>
												<h6>Course By <a href="#">Lorem ipsum </a></h6>
												<ul class="rating">
													<li><i class="fa fa-star font-warning"></i></li>
													<li><i class="fa fa-star font-warning"></i></li>
													<li><i class="fa fa-star font-warning"></i></li>
													<li><i class="fa fa-star font-warning"></i></li>
													<li><i class="fa fa-star-half-o font-warning"></i></li>
												</ul>
											</div>
											<div>
												<h5 class="mb-0 p-0 font-primary">28</h5><span
													class="d-block">Dec</span>
											</div>
										</div>
										<div class="media">
											<div class="media-body"><span class="f-w-600">Web Development</span>
												<h6>Course By <a href="#">Lorem ipsum </a></h6>
												<ul class="rating">
													<li><i class="fa fa-star font-warning"></i></li>
													<li><i class="fa fa-star font-warning"></i></li>
													<li><i class="fa fa-star font-warning"></i></li>
													<li><i class="fa fa-star font-warning"></i></li>
													<li><i class="fa fa-star-half-o font-warning"></i></li>
												</ul>
											</div>
											<div>
												<h5 class="mb-0 p-0 font-primary">5</h5><span class="d-block">Jan</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
    $(document).ready(function(){
        let base_url = "<?= base_url(); ?>";
        $('#searchBuku').keypress(function (e) {
			if (e.which == 13) {
                let inp = $('#searchBuku').val();
				window.location.href = base_url + 'digilab/search/' + inp;
			}
		});
    })
</script>

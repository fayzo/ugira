<div class="container mt-2">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i> Politics</i></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Politics</li>
                </ol>
            </div>
        </div>
    </section>

  <div id="politicsPagination">
    <?php echo $blog->blogs(0,'politics',$user_id); ?>
  </div>
</div>
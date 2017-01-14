<?php $__env->startSection('content'); ?>
	<div class="row">
        <div class="col-md-2">
            <?php echo $__env->make('sidebar.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;

        </div>
        <div class="col-md-10">
            <div class="box">
                <div class="box-header">
                    List
                </div>
                <div class="box-content">
                	<?php if(Session('success')): ?>
                		<div class="alert alert-success alert-dismissible" role="alert">
	                	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                			<?php echo e(session('success')); ?>

                		</div>
                	<?php endif; ?>
                    <table class="table table-bordered table-hover">
                    	<thead>
                        <tr>
                            <th>#</th>
                            <th>名前</th>
                            <th>住所</th>
                            <th>電話</th>
                            <th>会社名</th>
                            <th>メール</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>	
                        <?php $__currentLoopData = $orderer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $or): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>			      
					      <tr>
					        <td><?php echo e($or->id); ?></td>
					        <td><?php echo e($or->name); ?></td>
					        <td><?php echo e($or->address); ?> </td>
					        <td><?php echo e($or->tel); ?> </td>
					        <td><?php echo e($or->address); ?></td>
					        <td><?php echo e($or->email); ?> </td>
					        <td>
                                <button class="btn btn-default">Edit</button>
                                <button class="btn btn-danger">Del</button>
                            </td>
					      </tr>
					     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
					     </tbody>
                    </table>
                    <div class="text-right">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li>
                                    <a href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li>
                                    <a href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>

        </div>
        <div class="clearfix"></div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
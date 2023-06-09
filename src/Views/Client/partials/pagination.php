<div id="pagination" class="max-w-7xl mx-auto bg-white flex items-center justify-end pt-5 pb-7 pr-5 rounded-b-lg">
    <?php 
    if($_GET['page'] == 1) { ?>
        <a href="javascript:void(0)" class="translate-y-0.5 px-3 py-2 text-gray-600 cursor-not-allowed mr-2"><i class="material-icons text-base">keyboard_double_arrow_left</i>
        </a>
    <?php } else { ?>
        <a href="index.php?controller=phones&page=<?= $_GET['page'] - 1 ?>" class="translate-y-0.5 px-3 py-2 text-primary mr-2"><i class="material-icons text-base">keyboard_double_arrow_left</i>
        </a>
    <?php } ?>
    <ul class="flex items-center font-semibold">
        <?php for ($page_number = 1; $page_number <= $total_pages; $page_number++) {
            if ($page_number == $_GET['page']) {
                echo "<li><a class='pagination-link selected px-4 mr-2 py-2 hover:bg-primary hover:text-white' href='index.php?controller=phones&page=$page_number'>$page_number</a></li>";
            } else {
                echo "<li><a class='pagination-link px-4 mr-2 py-2 hover:bg-primary hover:text-white' href='index.php?controller=phones&page=$page_number'>$page_number</a></li>";
            }
        } ?>
    </ul>
    <?php 
    if($_GET['page'] < $total_pages) { ?>
        <a href="index.php?controller=phones&page=<?= $_GET['page'] + 1 ?>" class="translate-y-0.5 px-3 py-2 text-primary mr-2"><i class="material-icons text-base">keyboard_double_arrow_right</i></a>
    <?php } else { ?>
        <a href="javascript:void(0)" class="translate-y-0.5 px-3 py-2 text-gray-600 cursor-not-allowed mr-2"><i class="material-icons text-base">keyboard_double_arrow_right</i></a>
    <?php } ?>
</div>
<?php 

// Xoa param color tren url
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$parsed = parse_url($actual_link);
$query = $parsed['query'];

parse_str($query, $params);

unset($params['ma_hang']);
$string = http_build_query($params);
?>
<div class="max-w-7xl mx-auto mt-8 bg-white rounded-t-lg">
    <h1 class="font-semibold pl-4 pt-6 text-xl">Điện Thoại</h1>

    <div class="flex items-center justify-start px-10 mt-7">
        <?php foreach ($brands as $brand) : ?>
            <a href="index.php?<?=$string?>&ma_hang=<?=$brand['ma_hang']?>" class="brand flex items-center justify-center border-0 hover:border hover:border-primary w-[125px] h-[32px] mr-4 
            <?php
            if(isset($_GET['ma_hang']) && $brand['ma_hang'] == $_GET['ma_hang']) {
                echo "selected";
            }
            ?>">
                <img src="./public/<?php echo $brand['anh_logo'] ?>" alt="">
            </a>
        <?php endforeach ?>
    </div>

    <div class="flex items-center justify-start px-10 mt-5">
        <span class="text-sm font-semibold mr-6">Mức Giá</span>
        <a href="#" class="text-sm text-black border border-primary rounded-full px-4 py-1 mr-4 hover:bg-primary hover:text-white">
            Dưới 4 triệu
        </a>
        <a href="#" class="text-sm text-black border border-primary rounded-full px-4 py-1 mr-4 hover:bg-primary hover:text-white">
            Từ 4 triệu đến 8 triệu
        </a>
        <a href="#" class="text-sm text-black border border-primary rounded-full px-4 py-1 mr-4 hover:bg-primary hover:text-white">
            Từ 8 triệu đến 11 triệu
        </a>
        <a href="#" class="text-sm text-black border border-primary rounded-full px-4 py-1 mr-4 hover:bg-primary hover:text-white">
            Trên 12 triệu
        </a>
    </div>

    <div class="flex items-center justify-start px-10 mt-5">
        <span class="text-sm font-semibold mr-6">Sắp xếp theo</span>
        <a href="#" class="text-sm text-black border border-primary rounded-full px-4 py-1 mr-4 hover:bg-primary hover:text-white">
            Nổi bật
        </a>
        <a href="#" class="text-sm text-black border border-primary rounded-full px-4 py-1 mr-4 hover:bg-primary hover:text-white">
            Giảm nhiều
        </a>
        <a href="#" class="text-sm text-black border border-primary rounded-full px-4 py-1 mr-4 hover:bg-primary hover:text-white">
            Trả góp 0%
        </a>
        <a href="#" class="text-sm text-black border border-primary rounded-full px-4 py-1 mr-4 hover:bg-primary hover:text-white">
            Giá thấp đến cao
        </a>
        <a href="#" class="text-sm text-black border border-primary rounded-full px-4 py-1 mr-4 hover:bg-primary hover:text-white">
            Giá cao đến thấp
        </a>
    </div>

    <div class="grid grid-cols-5 mx-auto pt-8 gap-x-2 gap-y-2">
        <?php foreach ($phones as $phone) : ?>
                <a href="index.php?controller=phonedetail&id=<?php echo $phone['ma_san_pham'] ?>&id_detail=<?php echo $phone['ma_chi_tiet_san_pham'] ?>&type=2" class="cursor-pointer hover:shadow-lg hover:-translate-y-[2px] transition-all flex flex-col rounded-lg px-2">
                    <img src="./public/<?php echo $phone['anh_san_pham']; ?>" alt="<?php echo $phone['ten_san_pham'] ?>" class="flex-shrink-0">
                    <h2 class="text-truncate font-semibold pl-5 pt-4 flex-1"><?php echo $phone['ten_san_pham'] . " " . $phone['bo_nho_trong'] ?></h2>
                    <div class="grid grid-cols-2 px-5 pt-3 flex-1">
                        <span class="text-primary font-medium"><?php echo number_format(str_replace("", "", (int)str_replace(".", "", $phone['gia_tien'])), 0, '.', '.') ?>đ</span>
                        <span class="text-right text-sm mt-[2px]">Hoặc trả trước</span>
                        <span class="col-end-3 text-right text-sm text-primary">
                            <?php echo number_format(str_replace("", "", (int)str_replace(".", "", $phone['gia_tien']) * 0.33), 0, '.', '.') ?>đ
                        </span>
                    </div>
                    <button class="bg-primary text-white mx-auto rounded-[20px] w-[200px] py-[3px] flex justify-center items-center text-center mt-4 mb-6">รายละเอียด</button>
                </a>
        <?php endforeach ?>

    </div>
    <?php require './src/Views/Client/partials/pagination.php'; ?>
</div>
</div>
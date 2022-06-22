<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\CategoryNew;
use App\Models\Comment;
use App\Models\News;
use App\Models\Newsletter;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->importRoles();
        $this->importUserGroups();
        $this->importUser();
        $this->importUserGroupRoles();
        $this->importCategories();
        $this->importNews();
        $this->importComment();
        $this->importEmail();

    }

    public function importRoles()
    {
        $groups     = ['New', 'Categorie', 'User', 'UserGroup', 'Role', 'Category_new'];
        $actions    = ['viewAny', 'view', 'create', 'update', 'delete', 'restore', 'forceDelete'];
        foreach ($groups as $group) {
            foreach ($actions as $action) {
                DB::table('roles')->insert([
                    'name' => $group . '_' . $action,
                    'group_name' => $group,

                ]);
            }
        }
    }

    public function importUserGroups()
    {
        $userGroup = new UserGroup();
        $userGroup->name = 'Supper Admin';
        $userGroup->save();

        $userGroup = new UserGroup();
        $userGroup->name = 'Quản Lý';
        $userGroup->save();

        $userGroup = new UserGroup();
        $userGroup->name = 'Giám Đốc';
        $userGroup->save();


        $userGroup = new UserGroup();
        $userGroup->name = 'Nhân Viên';
        $userGroup->save();
    }

    public function importUser()
    {

        $user = new User();
        $user->name = 'Huỳnh Văn Toàn';
        $user->email = 'toan@gmail.com';
        $user->password = Hash::make('123456');
        $user->day_of_birth = '2002/09/24';
        $user->phone = '0935779035';
        $user->address = 'Quảng Trị';
        $user->start_day = '2022/01/10';
        $user->user_group_id  = '1';
        $user->gender = 'Nam';
        $user->avatar = 'upload/admin14.png';
        $user->save();

        $user = new User();
        $user->name = 'Võ Văn Tuấn';
        $user->email = 'tuan@gmail.com';
        $user->password = Hash::make('123456');
        $user->day_of_birth = '2002/04/24';
        $user->phone = '0777333274';
        $user->address = 'Quảng Trị';
        $user->start_day = '2021/10/29';
        $user->user_group_id  = '3';
        $user->gender = 'Nam';
        $user->avatar = 'upload/admin13.png';
        $user->save();

        $user = new User();
        $user->name = 'Mai Chiếm An';
        $user->email = 'an@gmail.com';
        $user->password = Hash::make('123456');
        $user->day_of_birth = '2003/06/27';
        $user->phone = '0916663237';
        $user->address = 'Quảng Trị';
        $user->start_day = '2021/10/29';
        $user->user_group_id  = '1';
        $user->gender = 'Nam';
        $user->avatar ='upload/admin10.png';
        $user->save();

        $user = new User();
        $user->name = 'Nguyễn Văn Quốc Việt';
        $user->email = 'viet@gmail.com';
        $user->password = Hash::make('123456');
        $user->day_of_birth = '2001/03/21';
        $user->phone = '0123456789';
        $user->address = 'Quảng Trị';
        $user->start_day = '2022/02/12';
        $user->user_group_id  = '4';
        $user->gender = 'Nam';
        $user->avatar = 'upload/admin22.png';
        $user->save();

        $user = new User();
        $user->name = 'Trần Ngọc Linh';
        $user->email = 'Linh@gmail.com';
        $user->password = Hash::make('123456');
        $user->day_of_birth = '2003/11/11';
        $user->phone = '0123456788';
        $user->address = 'Quảng Trị';
        $user->start_day = '2022/02/12';
        $user->user_group_id  = '4';
        $user->gender = 'Nam';
        $user->avatar = 'upload/admin21.png';
        $user->save();
    }

    public function importUserGroupRoles()
    {
        for ($i = 1; $i <= 42; $i++) {
            DB::table('user_group_roles')->insert([
                'user_group_id' => 1,
                'role_id' => $i,
            ]);
        }
    }

    public function importCategories()
    {
        $category = new Categorie();
        $category->id = 1;
        $category->name = 'Thể Thao';
        $category->save();

        $category = new Categorie();
        $category->id = 2;
        $category->name = 'Xã Hội';
        $category->save();

        $category = new Categorie();
        $category->id = 3;
        $category->name = 'Chính Trị';
        $category->save();


        $category = new Categorie();
        $category->id = 4;
        $category->name = 'Giải Trí';
        $category->save();
    }

    public function importNews()
    {
        $new = new News();
        $new->title = 'Hơn 245.000 tỷ đồng xây dựng năm cao tốc';
        $new->description = 'Quốc hội thông qua chủ trương đầu tư xây dựng dự án Vành đai 4 Hà Nội, Vành đai 3 TP HCM và ba cao tốc phía Nam, tổng vốn đầu tư 245.000 tỷ đồng';
        $new->image = 'https://i1-vnexpress.vnecdn.net/2022/06/16/hu-o-ng-tuye-n-va-nh-dai-4-jpg-2992-8981-1655349629.png?w=680&h=0&q=100&dpr=1&fit=crop&s=pNO0K37jugXu50MKKySovA';
        $new->content = 'Sáng 16/6, Quốc hội thông qua nghị quyết về chủ trương đầu tư dự án xây dựng đường Vành đai 4 vùng thủ đô. Tuyến đường dài 112,8 km, chia làm 7 dự án thành phần, đi qua Hà Nội, Hưng Yên, Bắc Ninh; nhu cầu sử dụng đất hơn 1.300 ha. Khi đưa vào khai thác, tuyến đường sẽ áp dụng thu phí tự động không dừng.
        Sơ bộ tổng mức đầu tư của dự án là 85.800 tỷ đồng. Nguồn ngân sách nhà nước giai đoạn 2021-2025 là 41.860 tỷ đồng, bao gồm hơn 19.380 tỷ đồng từ nguồn vốn ngân sách trung ương trong kế hoạch đầu tư công trung hạn giai đoạn 2021-2025; nguồn vốn ngân sách địa phương là hơn 22.470 tỷ đồng (Hà Nội hơn 19.470 tỷ; Hưng Yên 1.000 tỷ; Bắc Ninh 2.000 tỷ).
        Nguồn ngân sách nhà nước giai đoạn 2026-2030 hơn 14.500 tỷ đồng, bao gồm 8.790 tỷ đồng từ nguồn vốn ngân sách trung ương; nguồn vốn ngân sách địa phương là hơn 5.710 tỷ đồng. Vốn do nhà đầu tư thu xếp hơn 29.440 tỷ đồng.
        Dự án được chuẩn bị đầu tư từ năm 2022, cơ bản hoàn thành năm 2026, khai thác năm 2027. UBND TP Hà Nội là cơ quan đầu mối tổ chức thực hiện dự án. Trong hai năm kể từ khi nghị quyết được thông qua, Quốc hội cho phép người đứng đầu cơ quan có thẩm quyền xem xét, quyết định chỉ định thầu với các gói thầu tư vấn, phục vụ di dời hạ tầng kỹ thuật;
        bồi thường, hỗ trợ, tái định cư. Trong thời gian này, nhà thầu thi công không phải thực hiện thủ tục cấp phép khai thác mỏ khoáng sản làm vật liệu xây dựng thông thường.';
        $new->status = 'hidden';
        $new->view = '1,2 Triệu lượt xem';
        $new->hot = 1;
        $new->puplish_date = '2022/6/16';
        $new->user_id = 1;
        $new->category_id = 3;
        $new->save();


        $new = new News();
        $new->title = 'Bộ Công an thông tin về "ông trùm" dùng mạng xã hội chỉ đạo chuyển trăm 115 kg ma túy';
        $new->description = 'Cục Cảnh sát điều tra tội phạm về ma tuý (C04, Bộ Công an) thông tin về đường dây mua bán cả trăm kg ma tuý xuyên quốc gia bị triệt phá với cách thức điều hành, chỉ đạo qua mạng xã hội.';
        $new->image = 'https://static-images.vnncdn.net/files/publish/2022/6/16/aa821fec0605c65b9f14-506.jpg';
        $new->content = 'Liên quan đến vụ án trên, ngày 16/6, Cục Cảnh sát điều tra tội phạm về ma túy (C04, Bộ Công an) cho biết đã bắt giữ 7 đối tượng, thu giữ 115 kg ma túy tổng hợp các loại, cùng nhiều tài liệu liên quan khác.
        Trước đó, ban chuyên án phát hiện đường dây mua bán, vận chuyển trái phép chất ma túy từ Campuchia về TP.HCM tiêu thụ.
        Điều hành đường dây là một đối tượng ở Campuchia, thông qua mạng xã hội chỉ đạo Trần Văn Hải (52 tuổi) và Nguyễn Thành Vinh (55 tuổi ở TP.HCM) phân phối cho các chân rết tiêu thụ trên địa bàn.
        Các đối tượng Hải, Vinh từng đi tù vì cướp giật tài sản. Sau khi ra tù, Hải tiếp tục thụ án 10 năm tù về tội mua bán trái phép chất ma túy, đến đầu năm 2022 đối tượng này được ra tù.
        Quá trình điều tra xác định, sau khi nhận ma túy từ Campuchia, các đối tượng vận chuyển về cất giấu tại kho ở Tôn Thất Thuyết, quận 4, TP.HCM. Tại đây, ma túy được chia nhỏ rồi bán cho Trần Trọng Khôi, Lê Minh Hảo, Trần Ngọc Diệp (vợ của Hảo), cả 2 người này đều SN 1992, trú tại TP.HCM và các chân rết khác theo sự chỉ đạo của đối tượng cầm đầu tại Campuchia.
        Ngày 4/6, tại địa phận xã Phú Xuân, huyện Nhà Bè, Cục C04 phối hợp với Công an TP.HCM, Bộ Tư lệnh Cảnh sát biển bắt quả tang Nguyễn Thành Vinh đang vận chuyển 100kg ma túy đựng trong 6 bao tải. Cùng thời điểm, tổ công tác bắt giữ Hải, thu giữ 1kg ma túy tổng hợp.
        Khám xét tại kho chứa ma túy do Hải thuê tại số 7 Tôn Thất Thuyết, thu giữ thêm 3 kg và 2.000 viên ma túy tổng hợp.
        Tiếp tục đấu tranh mở rộng vụ án, ngày 5/6, ban chuyên án bắt quả tang Lê Minh Hảo và Vũ Quốc Duy đang giao nhận 100 gói ma túy “đông trùng”. ';
        $new->status = 'show';
        $new->view = '1,5 Triệu lượt xem';
        $new->hot = 1;
        $new->puplish_date = '2022/6/16';
        $new->user_id = 1;
        $new->category_id = 3;
        $new->save();


        $new = new News();
        $new->title = 'Lộ diện 4 quốc gia chạy đua đăng cai VCK Asian Cup 2023';
        $new->description = 'Trước việc LĐBĐ Trung Quốc bất ngờ thông báo dừng việc đăng cai VCK Asian Cup 2023, điều này buộc AFC phải gấp rút tìm kiếm đội bóng thay thế.';
        $new->image = 'https://image.bongda24h.vn/medias/640x426twebp/original/2021/6/29/lo-thoi-diem-boc-tham-vck-asian-cup-2023.jpeg';
        $new->content = ' Lộ diện 4 quốc gia chạy đua đăng cai VCK Asian Cup 2023 Thứ Tư 15/06/2022 22:16(GMT+7)
        Trước việc LĐBĐ Trung Quốc bất ngờ thông báo dừng việc đăng cai VCK Asian Cup 2023, điều này buộc AFC phải gấp rút tìm kiếm đội bóng thay thế.
        Trước ảnh hưởng của dịch Covid-19, phía Trung Quốc vừa qua đã quyết định không đăng cai Asian Games 2002 và VCK Asian Cup 2023.
        Việc quốc gia tỷ dân không tổ chức ngày hội bóng đá lớn nhất châu lục khiến AFC phải khẩn cấp chọn ra nước chủ nhà mới thay thế Trung Quốc tổ chức Asian Cup 2023.
        Được biết vừa qua, AFC đã gửi thư mời tham gia quy trình đăng cai khẩn cấp đến tất cả các Liên đoàn thành viên, trong đó có Việt Nam (VFF), nếu Liên đoàn nào quan tâm và đủ năng lực đăng cai sẽ gửi thư đấu thầu với hạn chót ngày 30/6 tới đây.
        Ngay sau động thái này của AFC, chủ tịch LĐBĐ Nhật Bản, ông Kozo Tashima đã đánh tiếng cho biết nước này sẵn sàng nhận đăng cai và có thể tổ chức ngay đầu năm sau.
        Không chỉ có Nhật Bản, hiện tại một số quốc gia có tiềm lực kinh tế cũng sẵn sàng đăng cai giải đấu. Theo trang Asean Football, hiện tại đang có 4 quốc gia nộp đơn xin đăng cai gồm Nhật Bản, Australia, Hàn Quốc và Qatar.
        Nếu Qatar được chọn làm chủ nhà, giải đấu dự kiến sẽ được tổ chức vào tháng 1 năm 2024 do nước này không kịp tổ chức thêm một giải đấu quốc tế ngay sau VCK World Cup 2022 vào cuối năm nay.';
        $new->status = 'show';
        $new->view = '1,7 Triệu lượt xem';
        $new->hot = 1;
        $new->puplish_date = '2022/6/16';
        $new->user_id = 1;
        $new->category_id = 2;
        $new->save();


        $new = new News();
        $new->title = 'Vương Giả Vinh Diệu có động thái khiến Liên Quân lo “sốt vó”, Free Fire “bỗng dưng biến mất”';
        $new->description = 'Dù chưa phát hành toàn cầu nhưng sức nóng của Vương Giả Vinh Diệu đối với Liên Quân đã là rất lớn.';
        $new->image = 'https://kenh14cdn.com/thumb_w/620/203336854389633024/2022/6/15/photo-1-16552938028481265707373.jpg';
        $new->content = 'Theo SensorTower, BXH trò chơi di động có doanh thu cao nhất trên toàn thế giới vào tháng 5 năm 2022 là Honor of Kings (Vương Giả Vinh Diệu) của Tencent với chi tiêu cho người chơi xấp xỉ 268 triệu đô la, tương ứng với mức tăng trưởng 1,7% từ tháng 5 năm 2021. Khoảng 95% doanh thu của Vương Giả Vinh Diệu là từ Trung Quốc, tiếp theo là 1,7% từ Đài Bắc Trung Hoa và 1,7% từ Thái Lan. Tức là ngay cả trong trường hợp gộp cả doanh thu Liên Quân vào thì cũng chỉ đóng góp một thị phần rất nhỏ. Trong tương lai, khi mà Vương Giả Vinh Diệu được phát hành toàn cầu thì chắc chắn, doanh số sẽ thực sự “đáng gờm”.
        PUBG Mobile của Tencent là trò chơi di động có doanh thu cao thứ hai trên toàn thế giới vào tháng 5 năm 2022 với tổng doanh thu là 206,3 triệu đô la. Khoảng 67% doanh thu của PUBG Mobile đến từ Trung Quốc, nơi nó đã được bản địa hóa thành Game For Peace, tiếp theo là 6,4% từ Thổ Nhĩ Kỳ. Trò chơi có doanh thu cao nhất tiếp theo là Candy Crush Saga của King, tiếp theo là Genshin Impact từ miHoYo và Coin Master từ Moon Active.
        Điều bất ngờ là, Free Fire gần như biến mất trong BXH doanh thu game mobile toàn cầu tháng này. Điều rất hiếm khi xảy ra, ít nhất là trong khoảng 1 năm trở lại đây. Trong cả hai bảng doanh thu tổng lẫn iOS, Free Fire đều không hề xuất hiện.';
        $new->status = 'show';
        $new->view = '1,2 Triệu lượt xem';
        $new->hot = 1;
        $new->puplish_date = '2022/6/16';
        $new->user_id = 1;
        $new->category_id = 4;
        $new->save();
    }

    public function importComment(){

        for( $i=0; $i < 5;$i++ ){
            $comment = new Comment();
            $comment->content = "Xuất sắc";
            $comment->startus = "approved";
            $comment->new_id = rand(1,4);
            $comment ->save();

            $comment = new Comment();
            $comment->content = "Dở quá";
            $comment->startus = "pending";
            $comment->new_id = rand(1,4);
            $comment ->save();
        }
    }

    public function importEmail(){
        for( $i=0; $i <10;$i++){
            $this->faker = Faker::create();
            $Newsletter = new Newsletter();
            $Newsletter->email = $this->faker->email;
            $Newsletter->save();
        }
    }
}

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
        // $this->importEmail();
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
        $user->avatar = 'upload/admin10.png';
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
        $new->hot = 0;
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
        $new->hot = 0;
        $new->puplish_date = '2022/6/16';
        $new->user_id = 1;
        $new->category_id = 2;
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
        $new->hot = 0;
        $new->puplish_date = '2022/6/16';
        $new->user_id = 1;
        $new->category_id = 1;
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
        $new->hot = 0;
        $new->puplish_date = '2022/6/16';
        $new->user_id = 1;
        $new->category_id = 4;
        $new->save();





        $new = new News();
        $new->title = 'Một bác sĩ rơi từ tầng 12 bệnh viện Quân y 103 xuống đất tử vong';
        $new->description = 'Tại Bệnh viện Quân y 103 vừa xảy ra một vụ tai nạn thương tâm, một bác sĩ rơi từ tầng 12 của tòa nhà xuống đất tử vong.';
        $new->image = 'https://kenh14cdn.com/thumb_w/620/203336854389633024/2022/6/23/photo-1-16559592583831700187596.png';
        $new->content = 'Theo báo Dân Trí, tối ngày 22/6, trong khuôn viên bệnh viện Quân y 103 (phường Phúc La, quận Hà Đông, Hà Nội) xảy ra vụ việc một nam bác sĩ rơi từ tầng cao tòa nhà thuộc khuôn viên bệnh viện xuống đất tử vong.

        "Sự việc xảy ra vào khoảng 19h ngày 22/6, nam bác sĩ này rơi từ tầng 12 tòa nhà trong khuôn viên Bệnh viện Quân y 103 xuống đất tử vong. Hiện danh tính nạn nhân và nguyên nhân vụ việc đang được Cơ quan điều tra, Bộ Quốc phòng thụ lý làm rõ", báo Dân Trí dẫn nguồn tin.
        
        Một bác sĩ rơi từ tầng 12 bệnh viện Quân y 103 xuống đất tử vong - Ảnh 1.
        Hiện trường vụ việc. Ảnh: Báo Dân Trí
        
        Được biết, trước đó, trên mạng xã hội xôn xao một clip ghi lại hình ảnh một người đàn ông mặc áo blouse trắng nằm bất động dưới mặt đất, xung quanh có vũng máu. Bên cạnh người đàn ông có 2 nhân viên y tế đang tích cực sơ cứu. Sự việc được cho là xảy ra bên trong bệnh viện Quân y 103 (Hà Đông, Hà Nội).
        Cũng trong tối ngày 22/6, trên địa bàn quận Hai Bà Trưng, Hà Nội xảy ra vụ người đàn ông khoảng 65 tuổi rơi chung cư xuống đất tử vong.
        Theo báo Lao động, sự việc xảy ra vào khoảng 19h cùng ngày, tại chung cư 229 phố Vọng, phường Đồng Tâm. Vào thời điểm trên, chính quyền và Công an phường Đồng Tâm nhận tin báo về việc tại toà chung cư có địa chỉ tại phố Vọng, phường Đồng Tâm xảy ra vụ việc một người đàn ông rơi từ tầng cao xuống tử vong.
        Qua xác minh ban đầu, cơ quan chức năng xác định người đàn ông này tự tử. Nạn nhân 65 tuổi, là cư dân của toà chung cư. Khu chung cư này có 2 mặt, 1 mặt giáp với phố Vọng, 1 mặt giáp với đường Trần Đại Nghĩa. "Người này rơi từ trên cao xuống và mắc vào hàng rào" - vị lãnh đạo phường Đồng Tâm thông tin.';
        $new->status = 'show';
        $new->view = '1,2 Triệu lượt xem';
        $new->hot = 0;
        $new->puplish_date = '2022/6/23';
        $new->user_id = 3;
        $new->category_id = 2;
        $new->save();



        $new = new News();
        $new->title = 'Ăn bánh trôi ngô, 1 bé tử vong, 4 người nguy kịch';
        $new->description = '4 bệnh nhân nặng được chuyển tới BV Bạch Mai tổn thương gan ồ ạt và suy gan tối cấp tính hôn mê gan, tiên lượng rất nặng, có nguy cơ cao tử vong sau khi ăn bánh trôi từ bột ngô thừa.';
        $new->image = 'https://kenh14cdn.com/203336854389633024/2022/6/22/photo-1-16558604321581122399695.jpg';
        $new->content = 'Bệnh viện Bạch Mai đang điều trị cho 4 bệnh nhân bị ngộ độc nặng sau khi ăn bánh trôi ngô, trong đó 3 bệnh nhân đang được điều trị tại Trung tâm Chống độc và 1 bệnh nhân (20 tháng tuổi) đang được điều trị tại Trung tâm Nhi khoa.

        Theo lời người nhà bệnh nhân, trong hai ngày 9 - 10/6, gia đình bà Giàng Thị L., 54 tuổi trú tại thôn Làng Tỉnh Dào B, xã Lũng Pù, huyện Mèo Vạc, tỉnh Hà Giang làm bánh trôi ngô chia cho 4 hộ gia đình trong thôn cùng ăn, không ai có biểu hiện gì.
        
        Ngày 16/6, bà L. lấy số bột ngâm nước để khô còn thừa từ ngày 9/6 tiếp tục làm bánh trôi ngô nấu với đường kính cho 4 thành viên trong gia đình và 3 người khác trú tại thôn Phấu Hía sang chơi cùng ăn.
        
        Đến sáng 17/6 (sau ăn chưa đầy 24 giờ), cháu Mua Mí P., 9 tuổi (là cháu bà L.) có triệu chứng hoa mắt, chóng mặt, đau bụng, buồn nôn sau đó tử vong tại gia đình. Đồng thời, 6 thành viên cùng ăn bánh trôi ngô cũng xuất hiện triệu chứng tương tự như Mua Mí P.
        
        Sau khi tiếp nhận thông tin, Trung tâm Y tế huyện Mèo Vạc  phối hợp với Ủy ban nhân nhân xã Lũng Pù xác minh, đồng thời đưa các bệnh nhân đến Bệnh viện Đa khoa (BVĐK) huyện khám và điều trị.
        
        Tối cùng ngày, cả 6 bệnh nhân được chuyển đến BVĐK tỉnh cấp cứu, điều trị. Sau khi đánh giá thể trạng, 4 bệnh nhân bị nặng gồm 3 người lớn và một bé 20 tháng tuổi đã được chuyển từ BVĐK tỉnh Hà Giang về Trung tâm Chống độc và Trung tâm Nhi khoa, Bệnh viện Bạch Mai.
        
        Ăn bánh trôi ngô, 1 bé tử vong, 4 người nguy kịch - Ảnh 1.
        1 trong số 4 bệnh nhân đang điều trị tại Bệnh viện Bạch Mai
        
        TS.BS. Nguyễn Trung Nguyên - Giám đốc Trung tâm Chống độc Bạch Mai cho biết: Đặc điểm chung của 4 bệnh nhân nặng được chuyển tới Bệnh viện Bạch Mai là tổn thương gan ồ ạt và suy gan tối cấp tính (tức là xuất hiện rất sớm, diễn biến rất nhanh và nặng nề), hôn mê gan, tiên lượng rất nặng, có nguy cơ cao tử vong. Trong đó có lọc máu thay huyết tương thể tích cao, lọc máu liên tục, truyền thuốc giải độc.
        
        Khoảng hơn 10 năm trở về trước, Hà Giang thường xuyên xảy ra các vụ ngộ độc thực phẩm với hậu quả nặng nề và tử vong do ăn bánh trôi ngô.
        
        Nguyên nhân ban đầu được nghi do ngộ độc hóa chất diệt chuột, tuy nhiên, sau đó nguyên nhân được phát hiện do bánh trôi ngô chứa độc tố vi nấm (độc tố từ mốc), trong đó có tìm thấy độc tố orchratoxin từ một bệnh nhân về điều trị tại Trung tâm Chống độc.
        
        Nguyên nhân là khi làm bánh trôi ngô bà con phải xay ngô thành bột, làm bánh, ngay lần làm bánh đầu tiên có thể không sao nếu là bột mới xay, tuy nhiên nhiều trường hợp sau khi làm bánh, bột còn thừa để lại một thời gian nên bị mốc, chứa độc tố, bà con vẫn lấy làm bánh ăn dẫn tới ngộ độc. Chính quyền địa phương và cơ quan chức năng đã tuyên truyền và quán triệt và đã tránh được nhiều trường hợp ngộ độc.
        
        
        BS. Nguyên cho biết là đã được nhiều đồng nghiệp ở các tỉnh chia sẻ một thực tế là ở nhiều địa phương các tỉnh miền núi khu vực xa xôi, do hạn chế về điều kiện giao thông và kinh tế, nguồn thực phẩm gần như duy nhất của bà con là ngô.
        
        Ngô sau khi trồng có thể có sẵn ít mốc nhưng đặc biệt sau khi để khô nhiều tháng thì mốc dễ dàng phát triển.
        
        Nếu bà con tách lấy hạt ngô lành lặn làm sạch và xay thành bột làm bánh ăn ngay thì lượng mốc và độc tố có thể còn ít và chưa bị ngộ độc. Tuy nhiên, bột đã bị nghiền để không thì mốc nhanh chóng phát triển và dễ gây ngộ độc. Có một số nơi khác có thể có gạo nhưng lại gạo cũ bị mốc cũng có thể dẫn tới các ngộ độc và bệnh tật do độc tố từ mốc gây ra.
        
        Để ngăn ngừa những vụ ngộ độc đáng tiếc do ăn bánh trôi ngô, BS. Nguyên khuyến cáo người dân khi sử dụng hạt ngô khô làm thực phẩm, đặc biệt là những người dân sử dụng ngô làm thực phẩm thiết yếu như ở các tỉnh miền núi, vùng sâu vùng xa cần phải tuân theo các hướng dẫn khuyến cáo của chính quyền địa phương và các cơ quan chức năng về phòng tránh ngộ độc do ăn bánh trôi ngô.
        
        Bà con tuyệt đối không sử dụng ngô mốc, không sử dụng bột ngô cũ để làm bánh hay thức ăn. Hạt ngô kể cả sạch sau khi đã xay/nghiền thành bột thì chế biến ngay toàn bộ thành thức ăn và ăn hết sớm.';
        $new->status = 'show';
        $new->view = '1,2 Triệu lượt xem';
        $new->hot = 0;
        $new->puplish_date = '2022/6/23';
        $new->user_id = 3;
        $new->category_id = 2;
        $new->save();


        $new = new News();
        $new->title = 'Bé gái 10 tuổi hôn mê sau khi mổ viêm ruột thừa đã tử vong';
        $new->description = 'Sau gần 2 tháng cấp cứu, điều trị tại nhiều bệnh viện do hôn mê sau khi mổ ruột thừa, bé gái 10 tuổi đã không qua khỏi.';
        $new->image = 'https://kenh14cdn.com/thumb_w/660/203336854389633024/2022/6/23/photo-1-16559534074221164687211.jpg';
        $new->content = 'Sáng 23/6, ông Bùi Khắc Hùng, Giám đốc Trung tâm Y tế huyện Krông Pắk, tỉnh Đắk Lắk, cho biết cháu Nguyễn Hà Thảo N. (10 tuổi, ngụ huyện Krông Pắk) đã tử vong.

        Bé gái 10 tuổi hôn mê sau khi mổ viêm ruột thừa đã tử vong.
        Theo ông Hùng, cách đây 3 ngày, cháu N. được đưa từ Bệnh viện Nhi Đồng 2 - TP HCM về nhà. Trong những ngày qua, bệnh viện cũng thường xuyên thăm hỏi, hỗ trợ việc điều trị tại nhà. "Cháu đã không qua khỏi và mất vào khoảng 3 giờ sáng nay" - ông Hùng nói.
        
        Như Báo Người Lao Động đã phản ánh, anh Nguyễn Minh Dương (cha của cháu N.) cho biết tối 4/5, con anh kêu đau bụng nên ngày 5/5, vợ anh đã đưa cháu tới Trung tâm Y tế huyện Krông Pắk thăm khám. Lúc này, bác sĩ chẩn đoán cháu bị viêm ruột thừa và phải nhập viện để mổ. Kết thúc ca mổ, cháu bị hôn mê nên được chuyển lên Bệnh viện Đa khoa vùng Tây Nguyên.
        
        Đến trưa 7/5, gia đình anh Dương đã chuyển con xuống Bệnh viện Nhi Đồng 2 - TP HCM nhưng sức khỏe không tiến triển.
        
        Sau khi xảy ra vụ việc, anh Dương đã gửi đơn tới cơ quan chức năng đề nghị làm rõ nguyên nhân và khởi tố vụ án để điều tra.
        
        Nguyên nhân tử vong của cháu N. đang được cơ quan chức năng làm rõ.';
        $new->status = 'show';
        $new->view = '1,2 Triệu lượt xem';
        $new->hot = 0;
        $new->puplish_date = '2022/6/23';
        $new->user_id = 3;
        $new->category_id = 2;
        $new->save();



        $new = new News();
        $new->title = 'Nữ sinh lớp 7 bơ vơ vì mẹ mất sớm, cha đuối nước tử vong';
        $new->description = 'Đi tắm suối, người đàn ông ở tỉnh Quảng Trị không may bị đuối nước tử vong, để lại con thơ chịu cảnh mồ côi cả cha lẫn mẹ.';
        $new->image = 'https://kenh14cdn.com/thumb_w/660/203336854389633024/2022/6/23/photo-1-16559571859011823578463.jpg';
        $new->content = 'Ngày 23/6, UBND xã Tân Hợp, huyện Hướng Hóa (tỉnh Quảng Trị) xác nhận trên địa bàn vừa xảy ra một vụ đuối nước khiến 1 người tử vong.

        Nạn nhân là anh Dương Công T. (40 tuổi, quê ở huyện Lệ Thủy, tỉnh Quảng Bình, ngụ tại thôn Quyết Tâm, xã Tân Hợp).
        
        Nữ sinh lớp 7 bơ vơ vì mẹ mất sớm, cha đuối nước tử vong - Ảnh 1.
        Trước đó, vào chiều 22/6, anh T. cùng nhóm bạn đến suối Tà Đủ (xã Tân Hợp) để tắm. Quá trình tắm, anh T. tự tách mình ra khỏi nhóm. Đến khoảng 17 giờ cùng ngày, mọi người không thấy anh T. nên đi tìm và bất ngờ phát hiện thi thể anh T. nổi lên dưới suối Tà Đủ.
        
        Được biết, vợ anh T. đã mất do bệnh tật, anh có một con gái tên là Dương Nguyễn Diệu Châu, học sinh lớp 7, Trường Tiểu học và Trung học cơ sở Tân Hợp.
        
        Trong đêm 22/6, thi thể của anh T. đã được đưa về quê để người thân lo hậu sự.';
        $new->status = 'show';
        $new->view = '1,2 Triệu lượt xem';
        $new->hot = 0;
        $new->puplish_date = '2022/6/23';
        $new->user_id = 3;
        $new->category_id = 2;
        $new->save();

        $new = new News();
        $new->title = 'Man United sẽ ra sao nếu Ronaldo ra đi?';
        $new->description = 'Báo chí Anh vừa tiết lộ chuyện Cristiano Ronaldo đang không hài lòng với sự chậm chân của Man United trên TTCN từ đầu mùa Hè năm nay. Và thậm chí, Ronaldo còn tính tới khả năng chia tay Quỷ đỏ nếu tình hình không được cải thiện. Câu hỏi đặt ra là MU sẽ ra sao nếu mất nốt CR7?';
        $new->image = 'https://cdn.bongdaplus.vn/Assets/Media/2022/06/25/26/ronaldo.jpg';
        $new->content = 'HLV Erik ten Hag đã tới M.U từ trước khi mùa giải 2021/22 khép lại. Việc Quỷ đỏ bổ nhiệm Ten Hag từ rất sớm được cho là để họ có thêm thời gian để xây dựng đội bóng cũng như mang về Old Trafford các bản hợp đồng theo đúng ý đồ chiến lược gia người Hà Lan. Tuy nhiên, bất chấp mùa giải cũ đã khép lại được 1 tháng, thì tới thời điểm này M.U vẫn chưa mua được một cầu thủ nào mới.

        Họ từng nhắm tới Darwin Nunez. Nhưng ai cũng biết Nunez sau đó đã cập bến Liverpool. M.U được cho là đã theo đuổi De Jong suốt từ đầu mùa Hè này. Nhưng vụ chuyển nhượng của ngôi sao Hà Lan vẫn chưa có diễn biến mới, bất chấp M.U có vũ khí Ten Hag, người từng là thầy cũ của De Jong tại Ajax. Cả cầu thủ chạy cánh Antony của Ajax cũng được coi là mục tiêu chuyển nhượng hàng đầu của Quỷ đỏ. Nhưng cũng như vụ De Jong, thương vụ này cũng chưa có bước tiến nào đáng kể. 
        
        Trong khi đó, đã có ít nhất 2 cầu thủ từ chối M.U. Người đầu tiên là hậu vệ Jurrien Timber, người đã lập tức khước từ Quỷ đỏ sau khi nhận được sự cảnh báo của Van Gaal. Hay cả cầu thủ trẻ Malcolm Ebiowei cũng nói không với M.U vì thích tới… Crystal Palace hơn. Xin nhắc lại, Timber và Malcolm đều là 2 cái tên còn khá vô danh, nhưng cả 2 đều từ chối Quỷ đỏ. Điều này cho thấy sức hút của M.U trên TTCN đã tụt giảm thê thảm như thế nào. Bây giờ, họ không còn ở vị thế “cửa trên” khi đi đàm phán mua người như xưa nữa. 
        
        Tất cả đang khiến M.U thất thế trong cuộc đua tăng cường lực lượng cho mùa giải mới so với các đại gia khác ở Premier League. Man City đã có Erling Haaland. Liverpool mua được Nunez. Tottenham có Ivan Perisic, Yves Bissouma. Arsenal cũng bổ sung được Fabio Vieira, Marquinhos. Chỉ riêng Quỷ đỏ vẫn là con số 0. 
        
        Ronaldo rõ ràng không hài lòng về điều này. Theo tiết lộ của tờ Record, CR7 đã gửi thông điệp “nâng cấp đội bóng hoặc tôi sẽ ra đi” tới BLĐ M.U. Ronaldo là người luôn khao khát giành những danh hiệu. Anh không tin rằng với lực lượng như hiện tại, M.U có khả năng cạnh tranh chức vô địch ở mùa 2022/23. Ronaldo chắc chắn không muốn gắn bó lâu dài với một CLB như thế nên tối hậu thư đã được anh chuyển tới Old Trafford. Hợp đồng của Ronaldo với M.U vẫn còn thời hạn 1 năm nữa. Nhưng siêu sao Bồ Đào Nha sẵn sàng ra đi sớm hơn dự kiến nếu tình hình chuyển nhượng ở Quỷ đỏ không được cải thiện. 
        M.U không có Ronaldo thì sao?
        Tới đây, câu hỏi đặt ra là nếu M.U mất nốt CR7 thì sẽ ra sao? Mùa giải trước, đã có nhiều ý kiến cho rằng Ronaldo làm ảnh hưởng tới lối chơi chung của Quỷ đỏ. Sự xuất hiện của CR7 khiến M.U không thể đá pressing thời Ralf Rangnick, cũng như khó chơi phản công thời Ole Solsa. Tuy nhiên, dù có ý kiến trái chiều như nào thì vẫn không ai phủ nhận được Ronaldo chính là ngôi sao quan trọng nhất trên hàng công Quỷ đỏ mùa trước. Anh đã ghi 24 bàn trên mọi đấu trường và là Vua phá lưới M.U mùa 2021/22. Số bàn thắng của anh còn nhiều hơn gấp đôi người xếp sau là Bruno Fernandes (10). Thế nên điều đầu tiên mà M.U mất nếu Ronaldo ra đi là họ sẽ mất một cầu thủ sẽ đảm bảo mang về cho CLB ít nhất 20 pha lập công. 

        Mọi chuyện sẽ càng đáng ngại hơn nếu nhìn vào những tiền đạo còn lại mà Quỷ đỏ đang có nếu Ronaldo ra đi. Marcus Rashford đã sa sút thảm hại từ sau EURO 2020. Mason Greenwood thì chưa biết bao giờ mới được trở lại. Anthony Martial sẽ bị đem bán còn Edinson Cavani sẽ ra đi. Vậy ai sẽ ghi bàn cho M.U nếu Ronaldo rời Old Trafford? 

        Ten Hag có thể sẽ đem tới những tiền đạo mới. Nhưng kể cả vậy thì vai trò đàn anh, người dẫn dắt của Ronaldo vẫn rất quan trọng trong giai đoạn M.U chuyển giao thế hệ trên hàng công. Zlatan Ibrahimovic cũng từng làm rất tốt vai trò này trong mùa giải 2016/17, khi anh được Jose Mourinho đưa về Old Trafford và đã ghi tới 28 bàn/46 trận mùa đó. 

        Tóm lại, ở giai đoạn này, khi mọi thứ dưới thời Ten Hag là chưa rõ ràng, thì mất Ronaldo không phải điều tốt đẹp cho M.U. Bởi sự hồi sinh của Quỷ đỏ với Ten Hag vẫn là thứ gì đó còn mơ hồ. Nhưng hàng chục bàn thắng của Ronaldo cho Quỷ đỏ là con số nhìn thấy được. 

        Bayern bất ngờ nhắm Ronaldo
        Báo chí Anh bất ngờ tiết lộ thông tin Bayern đã đưa Ronaldo vào tầm ngắm để thay thế Lewandowski. Tiền đạo người Ba Lan đang muốn chuyển sang Barcelona, nhưng Hùm xám lại ngăn chưa cho thương vụ này xảy ra. Nếu tìm ra người thay thế xứng tầm kiểu như Ronaldo, rất có thể Bayern mới đồng ý để Lewandowski rời đi.

        21. Tổng số bàn thắng của 5 tiền đạo M.U mùa trước là Rashford, Greenwood, Cavani, Sancho và Elanga là 21 bàn, tức là còn chưa bằng một mình số bàn của Ronaldo (24 bàn).';
        $new->status = 'show';
        $new->view = '1,2 Triệu lượt xem';
        $new->hot = 0;
        $new->puplish_date = '2022/6/26';
        $new->user_id = 3;
        $new->category_id = 1;
        $new->save();




        $new = new News();
        $new->title = 'Ai xứng đáng thay Maguire làm đội trưởng của Man United?';
        $new->description = 'HLV Erik ten Hag đang phải làm một công việc đẩy khổ ải ở Man United. Ngoài việc xây dựng một đội hình đủ sức cạnh tranh các danh hiệu trong bối cảnh không cầu thủ nào muốn tới Old Trafford, ông còn một nhiệm vụ quan trọng khác. Đó là đi tìm thủ lĩnh mới cho Quỷ đỏ.';
        $new->image = 'https://cdn.bongdaplus.vn/Assets/Media/2022/06/25/26/Maguire-1.jpg';
        $new->content = '“Làm đội trưởng của Man United không phải là công việc dành cho những kẻ yếu đuối. Bạn phải biết cách dẫn dắt và khơi dậy tinh thần chiến đấu của các đồng đội”. Cựu thủ quân của M.U, Roy Keane từng nói vậy trong một cuộc trả lời phỏng vấn năm 2003. Và rõ ràng, cựu danh thủ người CH Ireland hoàn toàn có tư cách để đưa ra tuyên bố ấy.

        Vì sau 12 năm gắn bó với 17 danh hiệu lớn nhỏ cùng Quỷ đỏ, Keane đã trở thành một tượng đài của sân Old Trafford. Anh thậm chí từng được bầu là “Thủ quân vĩ đại nhất lịch sử Premier League” trong cuộc bầu chọn hồi tháng Ba vừa qua của trang SPORTbible, vượt qua những tên tuổi lừng lẫy khác như Steven Gerrard, John Terry hay Patrick Vieira. Mà Keane lại dường như có ác cảm đặc biệt với Harry Maguire.
        
        Bình luận trên sóng của kênh truyền hình Sky Sports hồi tháng Tư, cựu tiền vệ này thậm chí từng nói thẳng là Maguire “không đủ giỏi” để trở thành thủ lĩnh của M.U. Keane cho rằng “muốn trở thành một đội trưởng hợp lệ, bạn phải là cầu thủ hàng đầu ở vị trí của mình”. Nhưng nhìn lại mùa giải 2021/22, Maguire đã không chứng tỏ được gì cả trong khả năng phòng ngự lẫn năng lực lãnh đạo.
        
        Vì thế, nếu muốn xây dựng một đội bóng mới, HLV Ten Hag sẽ cần một thủ lĩnh mới. Tuy nhiên, ai là người xứng đáng trở thành “Quỷ đầu đàn” tại Old Trafford mùa giải tới? Nhìn vào những cái tên hiện tại, đó có lẽ sẽ chỉ là một trong ba cái tên Cristiano Ronaldo, David de Gea hoặc Bruno Fernandes.
        Lựa chọn lý tưởng nhất chính là Ronaldo, người vốn không xa lạ gì với vai trò đội trưởng sau hơn một thập kỷ đeo băng thủ quân của đội tuyển Bồ Đào Nha. CR7 cũng luôn đòi hỏi rất cao ở bản thân và cả các đồng đội, và vẫn cho thấy tầm ảnh hưởng rất lớn với đội bóng. Vấn đề duy nhất chỉ là anh đã 37 tuổi, nên không thể trở thành một giải pháp dài hạn.

        De Gea cũng hoàn toàn có thể đảm đương vai trò này. Thủ thành người Tây Ban Nha đang là một trong những cầu thủ gắn bó lâu nhất với M.U, và cũng luôn là chỗ dựa vững chắc cho các đồng đội. Chỉ có điều, việc thi đấu ở một vị trí đặc thù sẽ khiến anh khó tạo ảnh hưởng với các đồng đội.

        Cuối cùng là Bruno, lựa chọn trên lý thuyết là dễ lý giải nhất. Tiền vệ người Bồ Đào Nha chính là đội phó của M.U. Anh cũng đáp ứng đầy đủ các tiêu chí của Keane, từ chuyên môn cho đến tư chất thủ lĩnh. Nhưng câu hỏi đặt ra là liệu Bruno có thể “lãnh đạo” được đàn anh Ronaldo?';
        $new->status = 'show';
        $new->view = '1,2 Triệu lượt xem';
        $new->hot = 0;
        $new->puplish_date = '2022/6/26';
        $new->user_id = 3;
        $new->category_id = 1;
        $new->save();



        $new = new News();
        $new->title = 'Ten Hag "đẩy" Rangnick khỏi MU sau khi từ chối gặp mặt';
        $new->description = 'Theo ESPN, tân HLV Erik ten Hag là người đóng một vai trò quan trọng trong việc Ralf Rangnick đột ngột kết thúc giao kèo với Man United để chuyên tâm dẫn dắt ĐT Áo.';
        $new->image = 'https://cdn.bongdaplus.vn/Assets/Media/2022/06/24/8/ten-hag-MU.jpg';
        $new->content = 'Ralf Rangnick lên nắm quyền tại MU vào đầu tháng 12/2021 nhưng để lại nỗi thất vọng ghê gớm. Ông lập kỷ lục là HLV có tỷ lệ chiến thắng thấp nhất lịch sử đội bóng trong kỷ nguyên Premier League. Kể từ khi thay thế Ole Gunnar Solskjaer, HLV người Đức chỉ giành được 37,9% chiến thắng.

        Thành tích của Quỷ đỏ vô cùng tệ hại khi về đích thứ 6 chung cuộc ở Ngoại hạng Anh. Đội chủ sân Old Trafford thu về 58 điểm, là mùa giải họ giành số điểm thấp nhất kỷ nguyên Premier League. Ở các đấu trường khác, MU cũng đều thất bại cay đắng. Cuối tháng 5 vừa qua, Rangnick đã thông báo rằng ông sẽ không tiếp tục ở lại Man United với tư cách là cố vấn do những yêu cầu của vai trò HLV mới đảm nhiệm tại ĐT Áo.
        
        Nhưng thông tin mà ESPN mới đưa có vẻ không phải như thế. Cụ thể, Rangnick đã đồng ý rời Man United sớm, một phần vì Ten Hag không muốn miễn cưỡng làm việc với chiến thuật gia người Đức trong vai trò cố vấn. Có thông tn cho rằng, Man United không muốn giữ Rangnick sau khi tham khảo ý kiến của tân HLV Ten Hag.
        
        Chưa hết, Rangnick không hề hài lòng khi không được trao quyền trực tiếp chuyển giao công việc cho tân HLV của Quỷ đỏ. Rangnick mong đợi gặp mặt Ten Hag để có một cuộc nói chuyện chi tiết nhưng thay vào đó, cựu HLV Ajax quyết định chỉ trao đổi qua điện thoại.

        Tiếp đó, ESPN đưa tin, BLĐ đội chủ sân Old Trafford có phần không thoải mái trước một số bình luận công khai của Rangnick trong các cuộc họp báo, đặc biệt là khi vị HLV này tuyên bố CLB cần tới 10 tân binh trong mùa Hè 2022. Các nguồn tin cho biết thêm rằng Man United đã yêu cầu Rangnick ký một thỏa thuận không tiết lộ thông tin mật của CLB nhưng rồi ông vẫn "bon mồm".

        Bây giờ, nhiệm vụ tái thiết Man United sẽ do Ten Hag toàn quyền phụ trách. Cuối tháng này, MU sẽ hội quân chuẩn bị cho mùa giải mới. Trận ra mắt của Ten Hag trên cương vị mới tới vào ngày 12/7 khi MU đá giao hữu với Liverpool ở Thái Lan.';
        $new->status = 'show';
        $new->view = '1,2 Triệu lượt xem';
        $new->hot = 0;
        $new->puplish_date = '2022/6/26';
        $new->user_id = 3;
        $new->category_id = 1;
        $new->save();











        $new = new News();
        $new->title = 'AFF Cup đổi nhà tài trợ';
        $new->description = 'Kể từ năm 2022, AFF Cup sẽ gắn bó với nhà tài trợ mới. Giải đấu sẽ mang tên gọi: AFF Mitsubishi Electric Cup.';
        $new->image = 'https://cdn.bongdaplus.vn/Assets/Media/2022/05/23/56/aff-0.jpg';
        $new->content = 'Trưa 23/5, tại Hà Nội, LĐBĐ Đông Nam Á đã công bố nhà tài trợ mới cho giải vô địch bóng đá Đông Nam Á (AFF Cup). Đến dự buổi lễ công bố có các ông: Khiev Sameth, Chủ tịch LĐBĐ Đông Nam Á (AFF); Kunihiko Seki, Trưởng đại diện khu vực châu Á Thái Bình Dương của Tập đoàn Mitsubishi; Malcolm Thorpe - Giám đốc điều hành công ty SPORT FIVE khu vực Đông Nam Á, đối tác độc quyền về thương mại và truyền thông của AFF; Trần Quốc Tuấn - Quyền Chủ tịch LĐBĐ Việt Nam.

        Theo đó, kể từ năm 2022, AFF Cup sẽ gắn bó với một nhà tài trợ mới, là Mitsubishi Electric. Giải đấu sẽ có tên chính thức là AFF Mitsubishi Electric Cup. Ông Kunihiko Seki, Trưởng đại diện khu vực châu Á Thái Bình Dương của Tập đoàn Mitsubishi vinh dự nói: “Khi thế giới bắt đầu mở cửa trở lại sau thời gian dịch bệnh, chúng tôi rất vui mừng được trở thành nhà tài trợ chính của giải vô địch Đông Nam Á. Chúng tôi mong muốn cùng nhau xây dựng một tương lai tốt đẹp hơn với AFF. Mitsubishi Electric hy vọng có thể mang lại sự phấn khích và niềm vui cho nhiều người hâm mộ thông qua mối quan hệ này”.
        Chủ tịch Khiev Sameth của AFF khẳng định: “Mối quan hệ hợp tác này sẽ báo trước một kỷ nguyên mới cho bóng đá Đông Nam Á. Tôi rất lạc quan rằng chúng ta có thể đẩy giải đấu lên một tầm cao mới, cùng nhau nâng tầm bóng đá trong khu vực. Thực ra, Mitsubishi Electric đã tài trợ cho AFF Cup trong nhiều kỳ gần đây. Nhưng họ mới chỉ dừng lại ở nhà tài trợ vàng chứ chưa gắn tên với giải đấu”.

        Theo kế hoạch, giải đấu sẽ bắt đầu vào tháng 12, ngay sau khi World Cup kết thúc.';
        $new->status = 'show';
        $new->view = '1,2 Triệu lượt xem';
        $new->hot = 0;
        $new->puplish_date = '2022/6/26';
        $new->user_id = 3;
        $new->category_id = 1;
        $new->save();





        $new = new News();
        $new->title = 'Quang Hải được báo Thái Lan bầu vào đội hình tiêu biểu AFF Cup 2020';
        $new->description = 'Quang Hải và Witan Sulaeman của Indonesia được tờ Goal của Thái Lan bình chọn vào đội hình 11 cầu thủ tại AFF Cup 2020.';
        $new->image = 'https://cdn.bongdaplus.vn/Assets/Media/2022/01/03/38/hai.jpeg';
        $new->content = 'Tiền vệ Nguyễn Quang Hải là cầu thủ Việt Nam duy nhất góp mặt trong đội hình tiêu biểu AFF Cup 2020 do Goal phiên bản Thái Lan bình chọn. ĐT Thái Lan chiếm đến 9 vị trí trong đội hình xuất sắc trong đội hình 4-2-3-1, gồm thủ môn Chatchai Budprom, bộ tứ vệ Narubadin Weerawatnodom, Kritsada Kaman, Manuel Bihr, Theerathon Bunmathan, các tiền vệ Phitiwat Sukjitthammakul, Sarach Yooyen, Chanathip Songkrasin và chân sút Teerasil Dangda. 2 cầu thủ còn lại là Quang Hải và Witan Sulaeman (Indonesia). 
        "Với Quang Hải, AFF Cup 2020 là giải đấu đáng thất vọng. Anh vẫn là niềm hy vọng lớn của tuyển Việt Nam và duy trì phong độ đáng sợ. Ngay cả trong trận thua 0-2 trước Thái Lan ở bán kết lượt đi, Quang Hải vẫn cho thấy bản thân là cầu thủ nguy hiểm, khiến đối thủ phải gặp áp lực mỗi khi bóng rời đi từ cái chân trái của anh", tờ Goal phiên bản Thái Lan nhận xét về Quang Hải.

        Cũng nói thêm, tại AFF Cup 2020, Quang Hải thi đấu 6 trận cho tuyển Việt Nam. Anh để lại 2 bàn thắng, 2 kiến tạo và 13 đường chuyền tạo cơ hội. ';
        $new->status = 'show';
        $new->view = '1,2 Triệu lượt xem';
        $new->hot = 0;
        $new->puplish_date = '2022/6/26';
        $new->user_id = 3;
        $new->category_id = 1;
        $new->save();



        $new = new News();
        $new->title = 'Bóng đá Việt Nam và tấm gương Thái Lan: Học hỏi để phát triển hơn nữa';
        $new->description = 'Nhìn từ chức vô địch AFF Cup của đội tuyển Thái Lan, Việt Nam không chỉ thấy được những bài học về chuyên môn mà còn là sự phát triển đường dài mang tầm vĩ mô mà bóng đá đất nước Chùa vàng đã nghiêm túc thực hiện suốt 15 năm qua.';
        $new->image = 'https://cdn.bongdaplus.vn/Assets/Media/2022/01/04/25/VIET---THAI.jpg';
        $new->content = 'Ngay sau chức vô địch AFF Cup 2020, Alexandre Mano Polking, đương kim HLV trưởng đội tuyển Thái Lan đồng thời cũng là cựu thuyền trưởng CLB TP.HCM có nhận xét rằng V.League cần phải học hỏi nhiều ở Thai League. Ông đưa ra 2 tiêu chí cho thấy sự khác biệt giữa giải đấu số 1 của Thái Lan và giải đấu số 1 đến từ Việt Nam. Đó là hàng loạt SVĐ tốt và những cầu thủ giỏi. Cũng từ 2 yếu tố cốt lõi này, chất lượng của các CLB của Thái Lan ngày càng được nâng tầm trên bình diện châu lục. Nhờ đó, đẳng cấp của Thai League cũng được đẩy mạnh trong khoảng 5 năm trở lại đây. Theo xếp hạng của AFC, Thai League đang xếp thứ 9 tại châu Á, hơn Việt Nam 5 bậc trên BXH.

        Đấy là chất lượng nội hàm của giải đấu. Còn về mặt hình ảnh và giá trị truyền thông, việc có những CLB mạnh, các nội binh lẫn ngoại binh giỏi cộng thêm sân vận động được chăm sóc kỹ càng, chuyên nghiệp giúp Thai League thu hút sự quan tâm rất lớn của các đơn vị truyền hình và truyền thông. Theo Siam Sports, Thai League sẽ thu về tổng số tiền bản quyền truyền hình là 800 tỷ đồng/mùa. Nhờ vậy, mỗi CLB ở giải VĐQG Thái Lan có thể nhận dao động trong một mùa giải là từ 50-60 tỷ đồng. Chỉ riêng con số này cũng bằng nguyên ngân sách hoạt động trong năm của một CLB lớn tại V.League.
        
        Song song với đó, các hạng đấu của Thái Lan cũng được tổ chức theo mô hình kim tự tháp rất quy củ. Trong đó, đỉnh của kim tự tháp là Thai League 1 với 16 CLB tham gia. Thấp hơn ở Thai League 2, 18 CLB góp mặt. Xếp phía dưới là giải bán chuyên Thai League 3 tập hợp tới 72 CLB được chia làm 6 vùng miền gồm phía Bắc (11 đội), Đông Bắc (11 đội), phía Đông (12 đội), phía Tây (12 đội), nội đô Bangkok (14 đội) và phía Nam (12 đội). Đó là điều mà bóng đá Việt Nam với hệ thống các giải chuyên nghiệp và bán chuyên nên học hỏi để có sự cạnh tranh cao hơn, chất lượng tốt hơn nữa.
        Thành công của ĐTQG Thái Lan được xây dựng dựa trên hai nhóm cầu thủ. Thứ nhất là đa phần gương mặt chơi bóng ở Thai League - một giải chất lượng tương đối cao ở châu lục và thuộc diện số 1 Đông Nam Á. Thứ hai là 2 ngôi sao thành danh ở Nhật Bản gồm Chanathip Songkrasin và Theerathon Bunmathan. Những gì mà hai cầu thủ này thể hiện ở AFF Cup 2020 quả thực khiến người hâm mộ chờ đợi vào những cái tên như Hoàng Đức, Quang Hải có thể xuất ngoại để phát triển năng lực trong tương lai gần.

        HLV Polking của Thái Lan gợi ý: “Tôi mong Quang Hải, cầu thủ đại diện của Việt Nam có thể làm được như thế. Họ cần phải tới Nhật Bản, Hàn Quốc và các giải khác. Thậm chí là cả châu Âu. Các cầu thủ giỏi không nên bó buộc mình ở trong nước nữa”. Tiếp lời người thầy của mình, Chanathip – biểu tượng xuất ngoại thành công hy vọng: “Những cầu thủ giỏi nhất ở các đội tuyển trong khu vực như Quang Hải hay Hoàng Đức của Việt Nam nên cân nhắc rời khỏi vùng an toàn để tìm đến các nền bóng đá cao hơn nhằm tiếp tục nâng cao khả năng của mình”.';
        $new->status = 'show';
        $new->view = '1,2 Triệu lượt xem';
        $new->hot = 0;
        $new->puplish_date = '2022/6/26';
        $new->user_id = 3;
        $new->category_id = 1;
        $new->save();
    }


    public function importComment()
    {

        $comment = new Comment();
        $comment->content = "Tôi nghĩ rằng nụ cười rạng rỡ nhất trong cuộc đời tôi có thể là màn hình máy tính của tôi.";
        $comment->startus = "approved";
        $comment->new_id = rand(1, 4);
        $comment->save();

        $comment = new Comment();
        $comment->content = "Theo thẩm mỹ của loài lợn, tôi về cơ bản là một mỹ nhân.";
        $comment->startus = "pending";
        $comment->new_id = rand(1, 4);
        $comment->save();
    }
}

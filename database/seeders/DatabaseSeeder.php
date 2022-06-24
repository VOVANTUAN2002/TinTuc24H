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
        $new->hot = 1;
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
        $new->hot = 1;
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
        $new->title = 'Bị cư dân mạng tố "cướp chồng", Minh Hằng nói gì?';
        $new->description = 'Trước khi về chung một nhà, Minh Hằng và bạn trai gắn bó suốt 6 năm. Nửa kia không hoạt động lĩnh vực giải trí, do đó Minh Hằng giữ kín chuyện riêng tư.';
        $new->image = 'https://kenh14cdn.com/thumb_w/620/203336854389633024/2022/6/23/photo-1-1655948879006818664694.jpeg';
        $new->content = 'Chiều ngày 18/6, hôn lễ của nữ ca sĩ Minh Hằng và chồng doanh nhân Quốc Bảo diễn ra tại một resort ở Hồ Tràm, Bà Rịa - Vũng Tàu.
        Kể từ khi thông báo tổ chức đám cưới tới nay, Minh Hằng rất hiếm khi chia sẻ hình ảnh của chú rể. Theo Tri Thức Trực Tuyến, chồng của Minh Hằng là doanh nhân Nguyễn Quốc Bảo, Phó tổng giám đốc Công ty cổ phần Dệt Đông Quang (Đức Hòa, Long An). Theo thông tin trên website, công ty này được thành lập năm 2007, chuyên cung cấp các loại xơ, chỉ làm nguyên liệu đầu vào cho ngành dệt may.

        Ngoài ra, doanh nhân Quốc Bảo còn đứng tên đại diện pháp luật của hai doanh nghiệp khác, cũng có trụ sở tại tỉnh Long An.

        Bị cư dân mạng tố cướp chồng, Minh Hằng nói gì? - Ảnh 2.
        Khoảnh khắc ngọt ngào của Minh Hằng và ông xã

        Trước khi về chung một nhà, Minh Hằng và bạn trai gắn bó suốt 6 năm. Nửa kia không hoạt động lĩnh vực giải trí, do đó Minh Hằng giữ kín chuyện riêng tư.

        Mới đây, hôn nhân của vợ chồng Minh Hằng bất ngờ vướng vào thị phi. Nguyên nhân xuất phát từ lời mỉa mai, công kích từ cư dân mạng nhắm vào cặp đôi.

        Cụ thể, khi Minh Hằng trò chuyện cùng Noo Phước Thịnh ở phần bình luận trên Facebook, nhắc lại kỷ niệm trong tiệc cưới của mình, một cư dân mạng bất ngờ tung ra lời công kích: "Cướp chồng người ta làm chồng mình nên mới phải giấu danh tính. Bức thư của chị vợ người ta gửi đến mà giả vờ nai tơ không biết của ai được".


        Trước lời lẽ gay gắt, Minh Hằng lập tức lên tiếng phản hồi. "Tag" tên người này, nữ ca sĩ dằn mặt: "Bớt suy diễn". Ngay sau đó, nhiều cư dân mạng cũng thể hiện sự đồng tình với bình luận của nữ ca sĩ.

        Bị cư dân mạng tố cướp chồng, Minh Hằng nói gì? - Ảnh 3.
        Minh Hằng phản bác bình luận "kém duyên" của cư dân mạng

        Trong quá khứ, nghi vấn ông xã hiện tại của Minh Hằng là người yêu cũ của diễn viên Cao Thái Hà đặc biệt thu hút sự tò mò của dân tình.

        Vào tháng 11/2018, Minh Hằng bất ngờ đăng lên trang cá nhân hình ảnh nắm tay một người đàn ông bí mật. Đến năm 2020, Minh Hằng thường xuyên chia sẻ những hình ảnh khoe được người yêu chiều chuộng, quan tâm. Ngay lập tức, netizen vào cuộc soi ra nữ ca sĩ và người này thường đi du lịch vào một thời điểm, những bức ảnh check-in trong khung cảnh giống hệt nhau.

        Giữa lúc đó, trên mạng xã hội lại rộ lên nghi vấn bạn trai Minh Hằng chính là người yêu cũ của diễn viên Cao Thái Hà. Nghi vấn bắt nguồn từ những hình ảnh được Cao Thái Hà đăng lên trang cá nhân từ năm 2014. Nữ diễn viên thoải mái ôm ấp, nói những lời ngọt ngào, thậm chí còn xưng hô thân mật.

        Bị cư dân mạng tố cướp chồng, Minh Hằng nói gì? - Ảnh 4.
        Câu chuyện Minh Hằng yêu bạn trai cũ của Cao Thái Hà từng gây tò mò dư luận một thời gian dài

        Khi được thắc mắc vấn đề người yêu cũ, Cao Thái Hà từng thẳng thắn nói: "Sau khi chia tay tôi, anh ấy mới quen sao nữ hạng A kia. Tôi không nói tên sao nữ hạng A này ra được. Nhưng tôi biết cô ấy và cô ấy cũng biết tôi là người yêu cũ của anh. Chúng tôi gặp nhau ở sự kiện hoài, nhưng khi gặp cứ làm lơ thôi, không ai nói câu nào. Tôi sẽ không kể thêm về cô ấy, vì tôi chẳng muốn người ta bảo mình dựa hơi để mưu cầu sự nổi tiếng".

        Qua đó, có thể thấy thông tin cho rằng Minh Hằng "cướp chồng" chỉ là sự thêu dệt của cư dân mạng đối với nữ ca sĩ';
        $new->status = 'show';
        $new->view = '1,2 Triệu lượt xem';
        $new->hot = 0;
        $new->puplish_date = '2022/6/23';
        $new->user_id = 3;
        $new->category_id = 2;
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

    public function importEmail()
    {
        for ($i = 0; $i < 10; $i++) {
            $this->faker = Faker::create();

    public function importEmail(){

            $Newsletter = new Newsletter();
            $Newsletter->email = "vantoan092002@gmail.com";
            $Newsletter->save();

            $Newsletter = new Newsletter();
            $Newsletter->email = "chieman2k3@gmail.com";
            $Newsletter->save();

    }
}

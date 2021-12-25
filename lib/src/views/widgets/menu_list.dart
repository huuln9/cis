import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:vncitizens_home/src/controllers/configuration_controller.dart';
import 'package:vncitizens_authentication/vncitizens_authentication.dart';

class MenuList extends GetView<AuthenticationController> {
  const MenuList({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    final ConfigurationController configurationController = Get.find();
    final config = configurationController.configuration;
    List<dynamic> menuList =
        config['menuList'] != null ? List.from(config['menuList']) : [];

    return SafeArea(
      child: Scaffold(
        appBar: PreferredSize(
          preferredSize: const Size.fromHeight(100),
          child: Container(
            decoration: const BoxDecoration(
              image: DecorationImage(
                image: NetworkImage(
                    'https://raw.githubusercontent.com/huuln9/images/main/banner_2.png'),
                fit: BoxFit.cover,
              ),
            ),
            child: Obx(
              () => Align(
                alignment: Alignment.centerLeft,
                child: controller.status.value ==
                        AuthenticationStatus.authenticated
                    ? TextButton.icon(
                        onPressed: () => {},
                        icon: const Icon(
                          Icons.account_circle,
                          size: 50,
                          color: Colors.white,
                        ),
                        label: Column(
                          mainAxisAlignment: MainAxisAlignment.center,
                          crossAxisAlignment: CrossAxisAlignment.start,
                          children: [
                            const Text(
                              "User đã đăng nhập",
                              style:
                                  TextStyle(fontSize: 18, color: Colors.white),
                            ),
                            Text(
                              "View profile".tr,
                              style: const TextStyle(
                                  fontSize: 13, color: Colors.white),
                            ),
                          ],
                        ),
                      )
                    : TextButton.icon(
                        onPressed: () => Get.toNamed("/signin", id: 4),
                        icon: const Icon(
                          Icons.account_circle,
                          size: 50,
                          color: Colors.white,
                        ),
                        label: Text(
                          "Sign in".tr,
                          style: const TextStyle(
                            fontSize: 18,
                            color: Colors.white,
                          ),
                        ),
                      ),
              ),
            ),
          ),
        ),
        body: ScrollConfiguration(
          behavior: ScrollConfiguration.of(context).copyWith(scrollbars: false),
          child: ListView.builder(
            padding: const EdgeInsets.all(8),
            itemCount: menuList.length,
            itemBuilder: (BuildContext context, int index) {
              return Column(
                mainAxisAlignment: MainAxisAlignment.start,
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  TextButton.icon(
                    onPressed: () => Get.toNamed(
                      menuList[index]['route'],
                      arguments: [
                        menuList[index]['name'].toString().tr,
                        menuList[index]['icon'],
                        ...menuList[index]['route'] == '/place'
                            ? [menuList[index]['tagId']]
                            : [],
                        ...menuList[index]['route'] == '/place-type'
                            ? [menuList[index]['type'], 4]
                            : [],
                      ],
                      id: 4,
                    ),
                    icon: SizedBox(
                      width: 40,
                      height: 40,
                      child: Image.network(menuList[index]['icon']),
                    ),
                    label: Text(
                      menuList[index]['name'].toString().tr,
                      style: const TextStyle(
                        color: Colors.black,
                        fontSize: 18,
                      ),
                    ),
                  ),
                  const Padding(
                    padding: EdgeInsets.only(left: 10, right: 10, bottom: 10),
                    child: Divider(thickness: 1.0),
                  ),
                ],
              );
            },
          ),
        ),
      ),
    );
  }
}

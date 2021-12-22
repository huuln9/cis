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
            child: Align(
              alignment: Alignment.centerLeft,
              child: TextButton.icon(
                onPressed: () => {},
                icon: const Icon(
                  Icons.account_circle,
                  size: 50,
                  color: Colors.white,
                ),
                label: const Text(
                  "Đăng nhập",
                  style: TextStyle(fontSize: 18, color: Colors.white),
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
                    onPressed: () => Navigator.of(context).pushNamed(
                      menuList[index]['route'],
                      arguments: [
                        menuList[index]['name'] + "'s List",
                        menuList[index]['tagId'],
                      ],
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

    // return SafeArea(
    //   child: Scaffold(
    //     body: Column(
    //       mainAxisAlignment: MainAxisAlignment.start,
    //       children: [
    //         Container(
    //           decoration: BoxDecoration(
    //             image: DecorationImage(
    //               image: NetworkImage(config['menuBanner']),
    //               fit: BoxFit.cover,
    //             ),
    //           ),
    //           child: TextButton.icon(
    //             onPressed: () => {},
    //             icon: const Icon(Icons.account_circle, size: 50),
    //             label: controller.getAuthenticationStatus() ==
    //                     AuthenticationStatus.authenticated
    //                 ? const Text(
    //                     "AUTHENTICATED",
    //                     style: TextStyle(fontSize: 18, color: Colors.red),
    //                   )
    //                 : const Text(
    //                     "ĐĂNG NHẬP/ĐĂNG KÝ",
    //                     style: TextStyle(fontSize: 18, color: Colors.red),
    //                   ),
    //           ),
    //         ),
    //         for (var i = 0; i < homeMenu.length; i++)
    //           if (homeMenu[i]['enable'])
    //             Padding(
    //               padding: const EdgeInsets.all(5.0),
    //               child: TextButton.icon(
    //                 onPressed: () => Navigator.of(context).pushNamed(
    //                   homeMenu[i]['route'],
    //                   arguments: [
    //                     homeMenu[i]['name'] + "'s List",
    //                     homeMenu[i]['tagId'],
    //                   ],
    //                 ),
    //                 icon: SizedBox(
    //                   width: 30,
    //                   height: 30,
    //                   child: Image.network(homeMenu[i]['image']),
    //                 ),
    //                 label: Text(
    //                   "     " + homeMenu[i]['name'],
    //                   style: const TextStyle(
    //                     color: Colors.black,
    //                     fontSize: 18,
    //                   ),
    //                 ),
    //               ),
    //             ),
    //       ],
    //     ),
    //   ),
    // );
  }
}

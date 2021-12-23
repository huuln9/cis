import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:vncitizens_home/src/controllers/configuration_controller.dart';
import 'package:vncitizens_home/src/views/widgets/my_banner.dart';

class MenuGrid extends GetView<ConfigurationController> {
  const MenuGrid({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    final config = controller.configuration;
    List<dynamic> menuGrid =
        config['menuGrid'] != null ? List.from(config['menuGrid']) : [];

    return Scaffold(
      appBar: const PreferredSize(
        preferredSize: Size.fromHeight(200),
        child: MyBanner(),
      ),
      body: ScrollConfiguration(
        behavior: ScrollConfiguration.of(context).copyWith(scrollbars: false),
        child: GridView.count(
          padding: const EdgeInsets.all(10),
          crossAxisCount: 3,
          crossAxisSpacing: 10,
          mainAxisSpacing: 10,
          children: [
            for (var i = 0; i < menuGrid.length; i++)
              if (menuGrid[i]['enable'])
                IconButton(
                  icon: Column(
                    children: [
                      SizedBox(
                        child: Image.network(menuGrid[i]['icon']),
                        width: 60,
                        height: 60,
                      ),
                      const Padding(padding: EdgeInsets.only(top: 15)),
                      Expanded(
                        child: Text(
                          menuGrid[i]['name'].toString().tr,
                          style: const TextStyle(fontSize: 13),
                        ),
                      ),
                    ],
                  ),
                  onPressed: () => Get.toNamed(
                    menuGrid[i]['route'],
                    arguments: [
                      menuGrid[i]['name'].toString().tr + "'s List",
                      menuGrid[i]['tagId'],
                    ],
                    id: 0,
                  ),
                )
          ],
        ),
      ),
    );
  }
}

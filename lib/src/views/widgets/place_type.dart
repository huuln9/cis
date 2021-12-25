import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:vncitizens_home/src/controllers/configuration_controller.dart';

class PlaceType extends GetView<ConfigurationController> {
  final String name;
  final String type;
  final int navigatorKeyId;

  const PlaceType({
    Key? key,
    required this.name,
    required this.type,
    required this.navigatorKeyId,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    final config = controller.configuration;
    List<dynamic> placeTypes =
        config[type] != null ? List.from(config[type]) : [];

    return SafeArea(
      child: Scaffold(
        backgroundColor: Colors.grey.shade200,
        appBar: AppBar(
          flexibleSpace: const Image(
            image: NetworkImage(
                'https://raw.githubusercontent.com/huuln9/images/main/banner_2.png'),
            fit: BoxFit.cover,
          ),
          leading: IconButton(
            icon: const Icon(Icons.arrow_back_ios, color: Colors.white),
            onPressed: () => Get.back(id: navigatorKeyId),
          ),
          title: Align(
            alignment: Alignment.centerLeft,
            child: Text(
              name,
              style: const TextStyle(fontSize: 20, color: Colors.white),
            ),
          ),
        ),
        body: Padding(
          padding: const EdgeInsets.all(30.0),
          child: GridView.count(
            crossAxisSpacing: 30,
            mainAxisSpacing: 30,
            crossAxisCount: 2,
            children: <Widget>[
              for (var i = 0; i < placeTypes.length; i++)
                if (placeTypes[i]['enable'])
                  Container(
                    decoration: BoxDecoration(
                        color: Colors.white,
                        borderRadius: BorderRadius.circular(24)),
                    child: Padding(
                      padding: const EdgeInsets.all(8.0),
                      child: IconButton(
                        icon: Column(
                          mainAxisAlignment: MainAxisAlignment.center,
                          crossAxisAlignment: CrossAxisAlignment.center,
                          children: [
                            Expanded(
                              child: SizedBox(
                                child: Image.network(placeTypes[i]['icon']),
                                width: 80,
                                height: 80,
                              ),
                            ),
                            const Padding(padding: EdgeInsets.only(top: 8)),
                            Text(
                              placeTypes[i]['name'].toString().tr,
                              textAlign: TextAlign.center,
                              style: const TextStyle(fontSize: 13),
                            ),
                          ],
                        ),
                        onPressed: () => Get.toNamed(
                          placeTypes[i]['route'],
                          arguments: [
                            placeTypes[i]['name'].toString().tr,
                            placeTypes[i]['icon'],
                            placeTypes[i]['tagId'],
                          ],
                          id: navigatorKeyId,
                        ),
                      ),
                    ),
                  ),
            ],
          ),
        ),
      ),
    );
  }
}

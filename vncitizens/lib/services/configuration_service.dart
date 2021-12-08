import 'package:get/get.dart';
import 'package:vncitizens_home/env.dart';

const cloudPf = 'sy/';

class ConfigurationService extends GetConnect {
  Future<Map<String, dynamic>> fetchConfiguration() async {
    final response = await get(
        '$apiCloudURL/$cloudPf/app-deployment?deployment-id=$deploymentId&app-code=$appCode');
    if (response.statusCode == 200) {
      return response.body['configuration']['hConfig'];
    }
    throw Exception(response.body);
  }
}
